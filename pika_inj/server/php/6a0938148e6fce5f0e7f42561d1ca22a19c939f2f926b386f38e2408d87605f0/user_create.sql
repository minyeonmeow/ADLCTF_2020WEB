PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;

-- These are just decorations
CREATE TABLE IF NOT EXISTS "users"
(
        id integer not null
                primary key
                 autoincrement,
        username varchar(1024) not null,
        password varchar(1024) not null,
        name varchar(1024) not null
);
INSERT INTO users VALUES(1,'admin','cGlrYXBpa2FwaWthY2h1Cg==','PIKACHU');
INSERT INTO users VALUES(2,'guest','SSBhbSBhIGd1ZXN0IHVzZXJzOikK','GUEST');
INSERT INTO users VALUES(3,'hsufh','TXkgcGFzc3dvcmQgaXMgc2ltcGxlIGJ1dCB5b3UgY2FuJ3QgZ3Vlc3MgaXQsIGJlY2F1c2UgaXQgaGFzIDcwIGNoYXJzCg==','BOSS');

-- Huge amount of entries: In order to teach them writing a small script
--   instead of typing each one by hand.
CREATE TABLE flag1(flag varchar(1024));
INSERT INTO flag1 VALUES('n!cE TRy!');
INSERT INTO flag1 VALUES('N1ce trY!');
INSERT INTO flag1 VALUES('N1C3 72Y!');
INSERT INTO flag1 VALUES('niC3 7rY!');
INSERT INTO flag1 VALUES('NiC3 trY!');

CREATE TABLE flag2(flag varchar(1024));
INSERT INTO flag2 VALUES('N1cE TrY!');
INSERT INTO flag2 VALUES('nice trY!');
INSERT INTO flag2 VALUES('N1ce 7rY!');
INSERT INTO flag2 VALUES('N1CE t2Y!');
INSERT INTO flag2 VALUES('N!C3 try!');
INSERT INTO flag2 VALUES('niCe t2Y!');
INSERT INTO flag2 VALUES('n!C3 Try!');

CREATE TABLE flag3 (flag varchar(1024));
INSERT INTO flag3 VALUES('NiCe TRy!');
INSERT INTO flag3 VALUES('N!Ce TRy!');
INSERT INTO flag3 VALUES('niCE TRy!');
INSERT INTO flag3 VALUES('N!ce tRY!');
INSERT INTO flag3 VALUES('n!ce 7rY!');
INSERT INTO flag3 VALUES('n!C3 Try!');
INSERT INTO flag3 VALUES('n1cE 7Ry!');
INSERT INTO flag3 VALUES('N1CE tRy!');
INSERT INTO flag3 VALUES('n1c3 7Ry!');
INSERT INTO flag3 VALUES('N!c3 Try!');
INSERT INTO flag3 VALUES('N1CE t2Y!');
INSERT INTO flag3 VALUES('n1Ce T2y!');
INSERT INTO flag3 VALUES('NiC3 tRY!');

CREATE TABLE flag4 (flag varchar(1024));
INSERT INTO flag4 VALUES('n1Ce t2Y!');
INSERT INTO flag4 VALUES('N!ce TRy!');
INSERT INTO flag4 VALUES('N!cE 7Ry!');
INSERT INTO flag4 VALUES('niCE 7rY!');
INSERT INTO flag4 VALUES('n!C3 Try!');
INSERT INTO flag4 VALUES('N1CE 72Y!');
INSERT INTO flag4 VALUES('N1c3 72y!');
INSERT INTO flag4 VALUES('NiCE try!');
INSERT INTO flag4 VALUES('N!CE try!');
INSERT INTO flag4 VALUES('NicE TRY!');
INSERT INTO flag4 VALUES('niCE 7RY!');
INSERT INTO flag4 VALUES('n!C3 TrY!');
INSERT INTO flag4 VALUES('N1cE T2Y!');
INSERT INTO flag4 VALUES('N1ce try!');
INSERT INTO flag4 VALUES('N1cE Try!');
INSERT INTO flag4 VALUES('n!c3 trY!');
INSERT INTO flag4 VALUES('N1c3 TrY!');
INSERT INTO flag4 VALUES('ADLCTF{IdNonMesFecGaxJacet9twetefCalNoa}');
INSERT INTO flag4 VALUES('N!cE TrY!');

CREATE TABLE flag5 (flag varchar(1024));
INSERT INTO flag5 VALUES('NiCE Try!');
INSERT INTO flag5 VALUES('nicE 7ry!');
INSERT INTO flag5 VALUES('n1c3 try!');
INSERT INTO flag5 VALUES('n1C3 TRy!');
INSERT INTO flag5 VALUES('n1C3 tRY!');
INSERT INTO flag5 VALUES('Nice Try!');
INSERT INTO flag5 VALUES('N!ce Try!');
INSERT INTO flag5 VALUES('N1Ce tRY!');
INSERT INTO flag5 VALUES('niCE t2Y!');
INSERT INTO flag5 VALUES('N!C3 72y!');
INSERT INTO flag5 VALUES('N!C3 TRY!');
INSERT INTO flag5 VALUES('nice TrY!');
INSERT INTO flag5 VALUES('n!cE t2y!');
INSERT INTO flag5 VALUES('Nice TRY!');
INSERT INTO flag5 VALUES('n1CE tRY!');
INSERT INTO flag5 VALUES('N1CE tRy!');
INSERT INTO flag5 VALUES('NicE TRy!');
INSERT INTO flag5 VALUES('n1c3 TrY!');
INSERT INTO flag5 VALUES('N1CE TRY!');
INSERT INTO flag5 VALUES('NiC3 7rY!');
INSERT INTO flag5 VALUES('N!CE t2Y!');
INSERT INTO flag5 VALUES('n1cE T2Y!');
INSERT INTO flag5 VALUES('N1ce T2Y!');

CREATE TABLE flag6 (flag varchar(1024));
INSERT INTO flag6 VALUES('N1cE TRy!');
INSERT INTO flag6 VALUES('N!ce try!');
INSERT INTO flag6 VALUES('n1Ce T2y!');
INSERT INTO flag6 VALUES('n1C3 Try!');
INSERT INTO flag6 VALUES('n1Ce t2y!');
INSERT INTO flag6 VALUES('n1C3 t2Y!');
INSERT INTO flag6 VALUES('Nic3 T2y!');
INSERT INTO flag6 VALUES('NiC3 TrY!');
INSERT INTO flag6 VALUES('n1cE 72Y!');
INSERT INTO flag6 VALUES('nic3 tRy!');
INSERT INTO flag6 VALUES('N!c3 72y!');
INSERT INTO flag6 VALUES('N!cE tRY!');
INSERT INTO flag6 VALUES('Nic3 7RY!');
INSERT INTO flag6 VALUES('niC3 7RY!');
INSERT INTO flag6 VALUES('n1c3 TRy!');
INSERT INTO flag6 VALUES('n!ce try!');
INSERT INTO flag6 VALUES('N!cE T2Y!');
INSERT INTO flag6 VALUES('NicE try!');
INSERT INTO flag6 VALUES('N1c3 tRY!');
INSERT INTO flag6 VALUES('Nice tRy!');
INSERT INTO flag6 VALUES('NiCE TrY!');
INSERT INTO flag6 VALUES('n!cE TrY!');
INSERT INTO flag6 VALUES('n1c3 tRy!');

CREATE TABLE flag7 (flag varchar(1024));
INSERT INTO flag7 VALUES('nice tRy!');
INSERT INTO flag7 VALUES('n!cE tRY!');
INSERT INTO flag7 VALUES('NiCe 7rY!');
INSERT INTO flag7 VALUES('Nice tRY!');
INSERT INTO flag7 VALUES('niCE TRy!');
INSERT INTO flag7 VALUES('niCE trY!');
INSERT INTO flag7 VALUES('N1cE TRY!');
INSERT INTO flag7 VALUES('n!ce 7Ry!');
INSERT INTO flag7 VALUES('N1Ce 7ry!');
INSERT INTO flag7 VALUES('n1c3 TrY!');
INSERT INTO flag7 VALUES('n1CE 7Ry!');
INSERT INTO flag7 VALUES('n1cE TRy!');
INSERT INTO flag7 VALUES('n!C3 T2y!');
INSERT INTO flag7 VALUES('n1c3 tRY!');
INSERT INTO flag7 VALUES('n1Ce t2y!');
INSERT INTO flag7 VALUES('NicE t2y!');
INSERT INTO flag7 VALUES('nice TRY!');
INSERT INTO flag7 VALUES('NiCe Try!');
INSERT INTO flag7 VALUES('N1CE 7ry!');

CREATE TABLE flag8 (flag varchar(1024));
INSERT INTO flag8 VALUES('N1cE tRY!');
INSERT INTO flag8 VALUES('n1C3 7Ry!');
INSERT INTO flag8 VALUES('N!cE trY!');
INSERT INTO flag8 VALUES('n!c3 t2y!');
INSERT INTO flag8 VALUES('N!cE TRy!');
INSERT INTO flag8 VALUES('N1C3 try!');
INSERT INTO flag8 VALUES('nic3 7RY!');
INSERT INTO flag8 VALUES('n!ce tRy!');
INSERT INTO flag8 VALUES('nic3 7ry!');
INSERT INTO flag8 VALUES('niCE TrY!');
INSERT INTO flag8 VALUES('N!c3 trY!');
INSERT INTO flag8 VALUES('N!CE 72y!');
INSERT INTO flag8 VALUES('n!C3 TRy!');

CREATE TABLE flag9 (flag varchar(1024));
INSERT INTO flag9 VALUES('N1ce TRY!');
INSERT INTO flag9 VALUES('n!C3 72Y!');
INSERT INTO flag9 VALUES('N1ce trY!');
INSERT INTO flag9 VALUES('n1CE trY!');
INSERT INTO flag9 VALUES('nicE t2y!');
INSERT INTO flag9 VALUES('N!ce Try!');
INSERT INTO flag9 VALUES('n!c3 trY!');

CREATE TABLE flag10 (flag varchar(1024));
INSERT INTO flag10 VALUES('n!C3 7Ry!');
INSERT INTO flag10 VALUES('nice TrY!');
INSERT INTO flag10 VALUES('NiCE try!');
INSERT INTO flag10 VALUES('n!ce TrY!');
INSERT INTO flag10 VALUES('NiCe T2Y!');

DELETE FROM sqlite_sequence;
INSERT INTO sqlite_sequence VALUES('users',3);
CREATE UNIQUE INDEX users_usernamer_uindex
        on users (username);
COMMIT;

