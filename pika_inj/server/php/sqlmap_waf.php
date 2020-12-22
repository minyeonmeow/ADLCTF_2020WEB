<?php
    /*
     * SQLmap WAF written by davidhcefx, 2020.12.10
     * Can detect:
     *   - sqlmap with --dbms and --technique unspecified
     *   - sqlmap with --dbms=sqlite and --technique=B
     *   - sqlmap with --dbms=sqlite and --technique=T
     *   - resistant to basic tampering such as randomcase or space2comment
     */

    // Return true if pass firewall, otherwise false.
    function sqlmap_waf($input) {
        // minimize false positive as much as possible to avoid complaints XD
        $pattern = [
            // AND (SELECT CVAR(NULL) FROM MSysAccessObjects) IS NULL AND 'bAHR'='bAHR
            // AND (SELECT TDESENCRYPT(NULL,NULL)) IS NULL AND 'kTWJ'='kTWJ
            // AND (SELECT %SQLUPPER NULL) IS NULL AND 'murm'='murm
            // AND (SELECT MD5(NULL~NULL)) IS NULL AND 'LRuc'='LRuc
            // AND (SELECT (NULL SETEQ NULL)) IS NULL AND 'fPyS'='fPyS
            // AND (SELECT CHR(109)||CHR(73)||CHR(67)||CHR(81) FROM SYSIBM.SYSDUMMY1)='mICQ' AND 'SPxE'='SPxE
            // AND (SELECT NULLIF(USER,SESSION_USER) FROM SYSIBM.SYSDUMMY1) IS NULL AND 'EpdX'='EpdX
            // AND (SELECT NULLIFZERO(hashcode(NULL))) IS NULL AND 'AeTL'='AeTL
            // AND (SELECT 'WnJI' FROM INFORMATION_SCHEMA.IO_STATISTICS)='WnJI' AND 'cIOT'='cIOT
            // AND (SELECT STRINGTOUTF8(NULL)) IS NULL AND 'gkDZ'='gkDZ
            // AND (SELECT ASCII_CHAR(256) FROM SYSTEM.ONEROW) IS NULL AND 'usre'='usre
            // AND (SELECT INSTR2(NULL,NULL) FROM DUAL) IS NULL AND 'dDDa'='dDDa
            '/AND.+CVAR\(NULL\).+FROM.+MSysAccessObjects.+IS.+NULL.+AND/',
            '/AND.+TDESENCRYPT\(NULL,NULL\).+IS.+NULL.+AND/',
            '/AND.+%SQLUPPER[^)]+NULL.+IS.+NULL.+AND.+=/',
            '/AND.+MD5\(NULL~NULL\).+IS.+NULL.+AND.+=/',
            '/AND.+\(NULL[^)]+SETEQ[^)]+NULL\).+IS.+NULL.+AND.+=/',
            '/AND.+CHR.+CHR.+CHR.+CHR.+FROM.+SYSIBM\.SYSDUMMY1.+AND/',
            '/AND.+NULLIF\(USER,SESSION_USER\).+FROM.+SYSIBM\.SYSDUMMY1.+IS.+NULL.+AND/',
            '/AND.+NULLIFZERO\(hashcode\(NULL\).+IS.+NULL.+AND.+=/',
            '/AND.+SELECT.+INFORMATION_SCHEMA\.IO_STATISTICS\)=.+AND.+=/',
            '/AND.+STRINGTOUTF8\(NULL\).+IS.+NULL.+AND.+=/',
            '/AND.+ASCII_CHAR\(256\).+FROM.+SYSTEM.ONEROW.+IS.+NULL.+AND/',
            '/AND.+INSTR2\(NULL,NULL\).+FROM.+DUAL.+IS.+NULL.+AND.+=/',

            // Boolean-based (sqlite)
            // OR NOT SUBSTR((SELECT COALESCE(CAST(tbl_name AS TEXT),CAST(X'20' AS TEXT)) FROM sqlite_master WHERE type=CAST(X'7461626c65' AS TEXT) LIMIT 0,1),1,1)>CAST(X'41' AS TEXT)-- PvTJ
            '/NOT.+COALESCE.+(CAST.+AS.+TEXT.+){4,}/',

            // Time-based (sqlite)
            // OR 3112=(CASE WHEN (SUBSTR((SELECT COALESCE(tbl_name,' ') FROM sqlite_master WHERE type='table' LIMIT 2,1),1,1)>'f') THEN (LIKE('ABCDEFG',UPPER(HEX(RANDOMBLOB(300000000/2))))) ELSE 3112 END)-- rHtY
            '/CASE.+WHEN.+COALESCE.+WHERE.+type=.+THEN.+LIKE\(.ABCDEFG.,UPPER\(HEX\(RANDOMBLOB.+\/2.+ELSE.+END/',
            ];

        // check 'User-Agent' header first
        if (preg_match('/\bsqlmap\b/i', $_SERVER['HTTP_USER_AGENT']) === 1) {
            error_log("Waf detected: header contains 'sqlmap'");
            return false;
        }
        foreach ($pattern as $pat) {
            $pat = $pat . 'i';  // case-insensitive flag
            if (preg_match($pat, $input) === 1) {
                error_log("Waf detected: " . $input);
                return false;
            }
        }
        return true;
    }

    function get_ip_address() {
        // https://stackoverflow.com/a/24606761/7692547
        $trusted_proxies = ['127.0.0.1'];

        if (in_array($_SERVER['REMOTE_ADDR'], $trusted_proxies)) {
            // look up the headers
            if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $ips = array_map('trim', $ips);
                $ips = array_diff($ips, $trusted_proxies);
                if (!empty($ips)) {
                    return array_pop($ips);  // right-most untrusted ip
                }
            }
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  // TODO: which one is more reliable?
                return $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        return $_SERVER['REMOTE_ADDR'];
    }

    function check_if_banned($db, $ip, $timeout=900) {
        $stmt = $db->prepare("SELECT time FROM banned WHERE ip = ?;");
        $stmt->execute([$ip]);
        $res = $stmt->fetch();

        if (!empty($res['time'])) {
            if (time() < $res['time'] + $timeout) {
                return true;
            }
        }
        return false;
    }

    function ban_ip($db, $ip) {
        $cur_time = time();
        // try to update
        $stmt = $db->prepare("UPDATE banned SET time = ? WHERE ip = ?;");
        $stmt->execute([$cur_time, $ip]);

        if ($stmt->rowCount() === 0) {
            // insert new record
            $stmt = $db->prepare("INSERT INTO banned VALUES (?, ?);");
            $stmt->execute([$ip, $cur_time]);

            if ($stmt->rowCount() === 0) {
                error_log('INSERT failed: row count === 0, ' . $ip);
            }
        }
        error_log("Banned " . $ip . " (default timeout = 900)");
    }
