  
DELETE FROM comments;
DELETE FROM posts;
DELETE FROM bodyPart;
DELETE FROM difficulty;
DELETE FROM users;

INSERT INTO bodyPart(id, part) VALUES (1,'Arms');
INSERT INTO bodyPart(id, part) VALUES (2,'Chest');
INSERT INTO bodyPart(id, part) VALUES (3,'Abs');
INSERT INTO bodyPart(id, part) VALUES (4,'Legs');

 INSERT INTO users VALUES(1, true, 'Manda1', 'amanda.r.merrifield@gmail.com', 'password1', LOAD_FILE('views/images/logo.png'), NOW(),NOW(), 'Amanda',
  "Amanda is an outdoor exercise enthusiast, and loves to take long hikes, rock climb and swim in the ocean. However her preferred indoor exercise is yoga and weight training.");

 INSERT INTO users VALUES(2, true, 'Vani2', 'mayavanimudgal@gmail.com', 'password2', LOAD_FILE('views/images/logo.png'), NOW(),NOW(), 'Maya-Vani',

 "Maya-Vani is a certified lifeguard and has been a competitive swimmer for several years. She also enjoys practising and teaching martial arts, as she hopes to open her own women's self defence classes in the future");

 INSERT INTO users VALUES(3, true, 'Zita3', 'buzasizita@gmail.com', '$2y$10$vnowDo8U4rKhS1QWXqJwHutURfKmdfXzaOeHAqIw56QNbvbQhN1fW', 'views/images/IMG_0223.png', NOW(),NOW(), 'Zita',
  "Zita believes you don't have to be a professional athlete to incorporate sport into your everyday routine. She believes our exercises are perfect for beginners to complete and enjoy the guaranteed benefits.");
 
INSERT INTO users VALUES(4, true, 'Afro4', 'afrodytapudlo@hotmail.com', 'password4', 'views/images/logo.png', NOW(),NOW(), 'Afrodyta',
 "Afrodyta is extremely enthusiastic about exercise and the benefits it can have on your mental, social and physical wellbeing. This blog has allowed
  her to share her passion for keeping fit, with others.");


INSERT INTO difficulty VALUES (1,'Beginner');
INSERT INTO difficulty VALUES (2,'Intermediate');
INSERT INTO difficulty VALUES (3,'Advanced');

--Arms-

        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
                VALUES (1,1,'Bent Knee Pushup',1, 1, 'Step 1: Starting position: Start with hands on the floor, straighten arms underneath  shoulders. Step 2: Step knees back behind you so there is a straight line through. Step 3: Engage the glutes, tense legs and brace the core to keep the body rigid. ','' , NOW());
        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
               VALUES (2,1,'Spider Walks',1, 2, ' Step 1: Starting position: Push-up with hands shoulder-width apart and legs straight out hip-width apart. Step 2: Push the toes into the floor and squeeze the thigh and glute while moving the opposite knee forward. Step 3: When one leg is forward, push back through the heel to straighten the same leg. Step 4: Then straighten the other leg and bring the other knee towards the opposite elbow while reaching forward with hands. ',
                     '' , NOW());
        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
               VALUES (3,1,'Overhead Triceps Extension',1, 3, ' Step 1: Starting position: Stand with feet hip-width apart, holding a dumbbell over the head and extending arms straight. Step 2: Everything from shoulders to elbows remain still, slowly bend elbows, lowering the weight  behind the head until the arms are just lower than 90 degrees. Step 3: Pause, and keep the core tight before raising back to straight. ',
                     '' , NOW());

-- Chest-

        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
                VALUES (4,2,'Standing Chest Stretch',2,1, 'Step 1: Starting position: Standing upright with fingers interlinked behind the head. Step 2: Draw both elbows back to open up the shoulders and stretch the pectorial muscles.',
                         '', NOW());
        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
               VALUES (5,2,' Stability Ball Push-Up',2, 2, ' Step 1: Starting position: Lay with chest on the stability ball. Step 2: Place hands on the ball at the sides of the chest shoulder-width apart. Step 3: Place toes on the floor, legs straight. Push body up until the arms are almost straight
                        but do not lock elbows whilst maintaining balance.','', NOW());
        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
                VALUES (6,2,'Power Push Down',2, 3, ' Step 1: Starting position: Whilst standing, lean over slightly at the hips keeping the back flat. Step 2: Place the stability ball at the chest with elbows out to the sides. Step 3: Forcefully push the ball towards
                        the floor underneath the chest and catch the ball when it rebounds.', ''
                       , NOW());

--Abs-

        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
                VALUES (10,4, 'Crunch',4, 1, 'Step 1: Starting position: Lie down on with the back on the ground. Step 2: Plant feet hip-width apart on the floor. Step 3: Bend knees and place arms across chest then tense and contract abs whilst inhaling.   Step 4: Exhale and lift upper body whilst keeping the head and neck relaxed before inhaling, then return to the starting position.',
                        '', NOW());
        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
                VALUES (11,4,'Front Plank',4, 2, ' Step 1: Starting position: Begin in the plank, face down with forearms and toes on the floor. Step 2: Starting position: Elbows are directly underneath shoulders and forearms are facing forward.Step 3: Starting position: Engage the abdominal muscles,whilst keeping torso straight and rigid to keep the body in a neutral spine position. Step 4: Starting position:  Heels should be over the balls of the feet and shoulder should be relaxed beforeholding this position then releasing to floor.',
                       '' , NOW());
        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
                VALUES (12,4,'Russian Twist',4, 3, ' Step 1: Starting position: Lie back on a Swiss ball. Step 2: The feet should be flat on the floor with knees bent to 90 degrees and arms extended with hands clasped out in front of cchest. Step 3: Rotate arms and torso to one side while the ball rolls across the back of the shoulders. Step 4: Stop the rotation when arms are parallel to floor. Pause, and then  return to the starting position.',
                       '' , NOW());

--Legs-


        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
                VALUES (7,3,'Bodyweight Squat',3, 3, 'Step 1: Starting position: Align feet shoulder-width apart where toes are slightly turned out. Step 2: Slowly bend at the knees and drop hips to lower the body. Step 3: At the bottom of the exercise pause for a moment and strongly push back up into the starting position.',
                       '', NOW());
        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
                VALUES (8,3,'Leg Push-off',3, 3, ' Step 1: Starting position: Step forward with one leg and slowly lower the body until the front knee is bent at least 90 degrees, while the back knee is off the floor. Step 2: Keep the torso upright then pause before pushing off the foot from the floor. Step 3: Return to the starting position as quickly as you can.',
                       '' , NOW());
        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
            VALUES (9,3,'Lateral Zig Zags',3, 3, 'Step 1: Starting position: Lift one foot off the ground and stand on the other leg. Step 2: Jump forward into the first box and then out the other side. Step 3: Jump backwards into the second box and then out the other side. Step 4: Continue these movements all the way down and then switch legs and repeat.
                    ',
                    '', NOW());

-- Back -

        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
            VALUES (13,5,'Childs Pose Kneel',5, 1, '  Step 1: Starting position: Kneel on the floor with toes together and  knees hip-width apart. Step 2: Rest palms on top of thighs whilst exhaling, lower torso between knees. Step 3: Starting position:Extend the arms alongside the torso with palms facing down whilst relaxing the shoulders toward the ground. ',
                   '' , NOW());
        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
            VALUES (14,5,'Stability Ball Prone Walkout',5, 2, 'Step 1: Starting position:lie over the ball as it is underneath just the hips. Step 2: Make sure the legs are straight and you form a neutral spine position whilst contracting the abdominals. Step 3: Use hands to slowly walk forward while balancing legs on the top of the stability ball. Step 4: As the legs stay up walk out as far as posible whilst balanced, then pause before walking back. ',
                    '', NOW());
        INSERT INTO posts(id,user_id,exercise_name,body_part_id,difficulty_id,description, photo, created_at)
            VALUES (15,5,'  Prone Scapular (Shoulder) Stabilization Series Y',5, 3, '    Step 1: You should  feel like one-half of the letter "Y" when you are in the uppermost position, as thumbs should be facing up towards the ceiling. Step 2: Hold this "Y" position for a couple of seconds. Step 3 :Slowly lower back down to the  starting position and repeat.',
                  ''  , NOW());