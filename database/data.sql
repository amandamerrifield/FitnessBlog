DELETE FROM posts;
DELETE FROM bodyPart;
DELETE FROM difficulty;
DELETE FROM users;




INSERT INTO bodyPart(id, part) VALUES (1,'arms');
INSERT INTO bodyPart(id, part) VALUES (2,'chest');
INSERT INTO bodyPart(id, part) VALUES (3,'abs');
INSERT INTO bodyPart(id, part) VALUES (4,'legs');

INSERT INTO users VALUES (1,false,'hanna99','hanna@gmail.com','password',NOW(), NOW());

INSERT INTO difficulty VALUES (1,'beginner');
INSERT INTO difficulty VALUES (2,'intermediate');
INSERT INTO difficulty VALUES (3,'advanced');

# INSERT INTO images VAlUES (1, 'PHOTO');

INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description)
    VALUES (1,1,'running',4, 1, 'Run around the block 3 times');