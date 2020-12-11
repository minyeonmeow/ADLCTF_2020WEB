<?php
    /* SQLmap waf written by davidhcefx, 2020.12.10 */

    // Return true if pass firewall, otherwise false.
    function sqlmap_waf($input) {
        // minimize false positive to avoid complaints XD
        $pattern = [
            '/CVAR.+NULL.+MSysAccessObjects.+NULL.+AND/',
            '/TDESENCRYPT.+NULL.+NULL.+NULL/',
            '/%SQLUPPER.+NULL.+IS.+NULL/',
            '/MD5.+NULL.+NULL.+IS.+NULL/',
            '/NULL.+SETEQ.+NULL.+NULL/',
            '/CHR.+CHR.+CHR.+CHR.+SYSIBM\.SYSDUMMY1.+AND/',
            '/NULLIF.+USER.+SESSION_USER.+SYSIBM\.SYSDUMMY1.+NULL/',
            '/NULLIFZERO.+hashcode.+NULL.+NULL/',
            '/AND.+SELECT.+RDB\$DATABASE.+AND/',
            '/AND.+SELECT.+INFORMATION_SCHEMA\.IO_STATISTICS.+AND/',
            '/STRINGTOUTF8.+IS.+NULL.+AND/',
            ];

        foreach ($pattern as $pat) {
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
