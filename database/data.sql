DELETE FROM comments;
DELETE FROM posts;
DELETE FROM bodyPart;
DELETE FROM difficulty;
DELETE FROM users;


INSERT INTO bodyPart(id, part) VALUES (1,'arms');
INSERT INTO bodyPart(id, part) VALUES (2,'chest');
INSERT INTO bodyPart(id, part) VALUES (3,'abs');
INSERT INTO bodyPart(id, part) VALUES (4,'legs');

INSERT INTO users VALUES (1,false,'hanna99','hanna@gmail.com','password',LOAD_FILE('d:\\flower.gif'),NOW(), NOW(),'Hannah','Hi I am Hannah');
INSERT INTO users VALUES (2, true, 'admin', 'admin@google.com', 'password', LOAD_FILE('/Users/zita/Desktop/FibonacciDualSpiral.png'), DATE('2020-2-20'),NOW(), 'Admin','Hi I am the admin');

INSERT INTO difficulty VALUES (1,'beginner');
INSERT INTO difficulty VALUES (2,'intermediate');
INSERT INTO difficulty VALUES (3,'advanced');


INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description)
    VALUES (1,1,'running',4, 1, 'Run around the block 3 times');

<<<<<<< HEAD
=======
INSERT INTO comments VALUES (1,1,NOW(),'This is an amazing exercise!');
>>>>>>> c16835019abe8adb1246d5c9ebe9a129fd6f0fc9
