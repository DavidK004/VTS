--DDL SCRIPT

CREATE TABLE users (
    -- Private information
    id              INT IDENTITY UNIQUE NOT NULL,
    username        VARCHAR(30) UNIQUE NOT NULL,
    password        VARCHAR(25) NOT NULL,
    email           VARCHAR(50) UNIQUE NOT NULL,
    role            CHAR(15) NOT NULL DEFAULT 'user',
    is_active       INT NOT NULL DEFAULT 1,

    last_login      DATETIME NULL,
    data_joined     DATETIME DEFAULT CURRENT_TIMESTAMP,

    -- Public information
    first_name      VARCHAR(25) DEFAULT '',
    last_name       VARCHAR(25) DEFAULT '',
    avatar_url      VARCHAR(255) NULL,
    display_name    VARCHAR(255)NULL,
    publicity       CHAR(30) NOT NULL DEFAULT 'everyone',

    CONSTRAINT user_pk PRIMARY KEY(id),
    CONSTRAINT user_role_check CHECK(role IN ('blocked', 'user', 'admin')),
    CONSTRAINT user_publicity_check CHECK(publicity IN ('private', 'only_friends', 'friend_friends', 'everyone'))
);




-- if users are subscribed to each other, they are friends.
CREATE TABLE followers (
    follower_user_id        INT NOT NULL,
    followed_user_id		INT NOT NULL,

    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY(follower_user_id) REFERENCES users(id),
    FOREIGN KEY(followed_user_id) REFERENCES users(id)
);


-- +------------------------------+
-- |          C H A T S           |
-- +------------------------------+
CREATE TABLE chats (
    id              INT IDENTITY UNIQUE NOT NULL,
    name            VARCHAR(50) NOT NULL,
    type            CHAR(15) NOT NULL DEFAULT 'personal',
    is_closed       INT NOT NULL DEFAULT 0,

    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT chat_pk PRIMARY KEY(id),
    CONSTRAINT chat_type_check CHECK(type IN ('personal', 'group'))
);
CREATE TABLE chat_participants (
    is_admin        INT NOT NULL DEFAULT 0,

    user_id         INT NOT NULL,
    chat_id         INT NOT NULL,

    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(chat_id) REFERENCES chats(id)
);
CREATE TABLE chat_messages (
    id              INT IDENTITY UNIQUE NOT NULL,
    content         TEXT NOT NULL,

    user_id         INT NOT NULL,
    chat_id         INT NOT NULL,

	CONSTRAINT chat_message_pk PRIMARY KEY(id),

    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(chat_id) REFERENCES chats(id)
);

-- +------------------------------+
-- |          P O S T S           |
-- +------------------------------+
CREATE TABLE posts (
    id              INT IDENTITY UNIQUE NOT NULL,
    content         TEXT NOT NULL,

    user_id         INT NOT NULL,

    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT post_pk PRIMARY KEY(id),

    FOREIGN KEY(user_id) REFERENCES users(id)
);
CREATE TABLE post_comments (
    id              INT IDENTITY UNIQUE NOT NULL,
    content         TEXT NOT NULL,

    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME DEFAULT CURRENT_TIMESTAMP,

    -- If user reply other comment
    parent_id        INT NULL,

    post_id         INT NOT NULL,
    user_id         INT NOT NULL,

    CONSTRAINT post_comment_pk PRIMARY KEY(id),

    FOREIGN KEY(parent_id) REFERENCES post_comments(id),
    FOREIGN KEY(post_id) REFERENCES posts(id),
    FOREIGN KEY(user_id) REFERENCES users(id)
);
CREATE TABLE post_reactions (
    id              INT IDENTITY UNIQUE NOT NULL,
    type            CHAR(15) NOT NULL DEFAULT 'like',

    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,

    post_id         INT NOT NULL,
    user_id         INT NOT NULL,

    CONSTRAINT post_reaction_pk PRIMARY KEY(id),
    CONSTRAINT post_reaction_type CHECK(type IN ('like', 'dislike')),

    FOREIGN KEY(post_id) REFERENCES posts(id),
    FOREIGN KEY(user_id) REFERENCES users(id)
);

-- +------------------------------+
-- |          F I L E S           |
-- +------------------------------+

-- Only for images

CREATE TABLE files (
    id              INT IDENTITY UNIQUE NOT NULL,
    path_url        VARCHAR(255) NOT NULL,
    description     VARCHAR(255) NULL,
    type            CHAR(15) NOT NULL,

    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME DEFAULT CURRENT_TIMESTAMP,


    user_id         INT NOT NULL,

    CONSTRAINT file_pk PRIMARY KEY(id),
    CONSTRAINT file_type_check CHECK(type IN ('file', 'image', 'audio', 'video')),


    FOREIGN KEY(user_id) REFERENCES users(id)
);

-- Pinned files to post, to messages
CREATE TABLE message_pinned_files (
    message_id      INT NOT NULL,
    file_id         INT NOT NULL,
    sort_order      INT NOT NULL DEFAULT 0,

    FOREIGN KEY(message_id) REFERENCES chat_messages(id),
    FOREIGN KEY(file_id) REFERENCES files(id)
);
CREATE TABLE post_pinned_files (
    post_id         INT NOT NULL,
    file_id         INT NOT NULL,
    sort_order      INT NOT NULL DEFAULT 0,

    FOREIGN KEY(post_id) REFERENCES post_comments(id),
    FOREIGN KEY(file_id) REFERENCES files(id)
);



--DML SCRIPT

-- Insert into users table
INSERT INTO users (username, password, email, role, first_name, last_name, avatar_url, display_name) VALUES
('john_doe1', 'password123', 'john.doe1@example.com', 'user', 'John', 'Doe', 'https://example.com/avatar1.jpg', 'John D'),
('alice_s1', 'password456', 'alice.s1@example.com', 'user', 'Alice', 'Smith', 'https://example.com/avatar2.jpg', 'Alice S'),
('bob_jones', 'password789', 'bob.jones@example.com', 'admin', 'Bob', 'Jones', 'https://example.com/avatar3.jpg', 'Bob J'),
('carol_wh1', 'password101', 'carol.wh1@example.com', 'user', 'Carol', 'White', 'https://example.com/avatar4.jpg', 'Carol W'),
('david_b2', 'password102', 'david.b2@example.com', 'blocked', 'David', 'Brown', 'https://example.com/avatar5.jpg', 'David B'),
('emma_tay', 'password103', 'emma.tay@example.com', 'user', 'Emma', 'Taylor', 'https://example.com/avatar6.jpg', 'Emma T'),
('frank_lee', 'password104', 'frank.lee@example.com', 'admin', 'Frank', 'Lee', 'https://example.com/avatar7.jpg', 'Frank L'),
('grace_mil', 'password105', 'grace.mil@example.com', 'user', 'Grace', 'Miller', 'https://example.com/avatar8.jpg', 'Grace M'),
('hank_clrk', 'password106', 'hank.clrk@example.com', 'user', 'Hank', 'Clark', 'https://example.com/avatar9.jpg', 'Hank C'),
('irene_dvs', 'password107', 'irene.dvs@example.com', 'user', 'Irene', 'Davis', 'https://example.com/avatar10.jpg', 'Irene D');

-- Insert into followers table
INSERT INTO followers (follower_user_id, followed_user_id) VALUES
(1, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8),
(8, 9),
(9, 10),
(10, 1);

-- Insert into chats table
INSERT INTO chats (name, type, is_closed) VALUES
('Chat1', 'personal', 0),
('Group1', 'group', 0),
('Chat2', 'personal', 0),
('Group2', 'group', 0),
('Chat3', 'personal', 0),
('Group3', 'group', 0),
('Chat4', 'personal', 1),
('Group4', 'group', 0),
('Chat5', 'personal', 0),
('Group5', 'group', 0);

-- Insert into chat_participants table
INSERT INTO chat_participants (is_admin, user_id, chat_id) VALUES
(1, 1, 1),
(0, 2, 1),
(1, 3, 2),
(0, 4, 2),
(1, 5, 3),
(0, 6, 3),
(0, 7, 4),
(1, 8, 4),
(1, 9, 5),
(0, 10, 5);

-- Insert into chat_messages table
INSERT INTO chat_messages (content, user_id, chat_id) VALUES
('Hello, how are you?', 1, 1),
('I am fine, thank you!', 2, 1),
('Lets meet tomorrow', 3, 2),
('Looking forward to it', 4, 2),
('What time works for you?', 5, 3),
('Anytime after 3 PM', 6, 3),
('Lets discuss the project', 7, 4),
('Sure, when is the meeting?', 8, 4),
('Got the files, will review', 9, 5),
('Thanks, Ill check them', 10, 5);

-- Insert into posts table
INSERT INTO posts (content, user_id) VALUES
('Just finished a great workout!', 1),
('Had an amazing lunch today!', 2),
('Completed a new project!', 3),
('Enjoying a beautiful day at the park!', 4),
('Started reading a new book!', 5),
('The weather is fantastic!', 6),
('Worked on an exciting new idea!', 7),
('Had a great weekend getaway!', 8),
('Loving this new song!', 9),
('Exploring a new hobby!', 10);

-- Insert into post_comments table
INSERT INTO post_comments (content, post_id, user_id, parent_id) VALUES
('Nice job on the workout!', 1, 2, NULL),
('Sounds delicious!', 2, 3, NULL),
('Congrats on the project!', 3, 4, NULL),
('That sounds relaxing!', 4, 5, NULL),
('Enjoy the book!', 5, 6, NULL),
('I agree, the weather is amazing!', 6, 7, NULL),
('Great idea, keep it up!', 7, 8, NULL),
('Sounds like a lot of fun!', 8, 9, NULL),
('I love that song too!', 9, 10, NULL),
('Thats awesome! What hobby?', 10, 1, NULL);

-- Insert into post_reactions table
INSERT INTO post_reactions (type, post_id, user_id) VALUES
('like', 1, 2),
('dislike', 2, 3),
('like', 3, 4),
('like', 4, 5),
('dislike', 5, 6),
('like', 6, 7),
('like', 7, 8),
('dislike', 8, 9),
('like', 9, 10),
('like', 10, 1);

-- Insert into files table
INSERT INTO files (path_url, description, type, user_id) VALUES
('https://exmpl.com/file1.jpg', 'Profile Picture', 'image', 1),
('https://exmpl.com/file2.jpg', 'Vacation Photo', 'image', 2),
('https://exmpl.com/file3.mp3', 'Music Track', 'audio', 3),
('https://exmpl.com/file4.mp4', 'Video Clip', 'video', 4),
('https://exmpl.com/file5.pdf', 'Resume', 'file', 5),
('https://exmpl.com/file6.jpg', 'Family Photo', 'image', 6),
('https://exmpl.com/file7.mp3', 'Podcast', 'audio', 7),
('https://exmpl.com/file8.mp4', 'Conference Presentation', 'video', 8),
('https://exmpl.com/file9.jpg', 'Profile Picture', 'image', 9),
('https://exmpl.com/file10.pdf', 'Project Proposal', 'file', 10);

-- Insert into message_pinned_files table
INSERT INTO message_pinned_files (message_id, file_id, sort_order) VALUES
(1, 1, 0),
(2, 2, 1),
(3, 3, 2),
(4, 4, 3),
(5, 5, 4),
(6, 6, 5),
(7, 7, 6),
(8, 8, 7),
(9, 9, 8),
(10, 10, 9);


--UPITI

SELECT  *  FROM users;

SELECT * FROM users WHERE username = 'john_doe1';

SELECT * FROM posts WHERE user_id = 1;

SELECT u.username
FROM followers f
INNER JOIN users u ON f.follower_user_id = u.id
WHERE f.followed_user_id = 1;

SELECT u.username, pc.content AS comment
FROM post_comments pc
INNER JOIN users u ON pc.user_id = u.id
WHERE pc.post_id = 1;

SELECT COUNT(*) AS like_count
FROM post_reactions
WHERE post_id = 1 AND type = 'like';

SELECT cm.content, u.username
FROM chat_messages cm
INNER JOIN users u ON cm.user_id = u.id
WHERE cm.chat_id = 1;

SELECT p.id AS post_id, p.content AS post_content, pc.content AS comment_content
FROM posts p
LEFT JOIN post_comments pc ON p.id = pc.post_id;

SELECT p.id AS post_id,
       CAST(p.content AS VARCHAR(MAX)) AS post_content,
       COUNT(pr.id) AS like_count
FROM posts p
LEFT JOIN post_reactions pr ON p.id = pr.post_id AND pr.type = 'like'
GROUP BY p.id, CAST(p.content AS VARCHAR(MAX));

SELECT p.id AS post_id,
       CAST(p.content AS VARCHAR(MAX)) AS post_content,
       COUNT(pr.id) AS like_count
FROM posts p
LEFT JOIN post_reactions pr ON p.id = pr.post_id AND pr.type = 'like'
WHERE p.user_id IN (1, 2, 3)  
GROUP BY p.id, CAST(p.content AS VARCHAR(MAX))  
HAVING COUNT(pr.id) >= 1;

--POGLEDI (VIEWS)

CREATE VIEW vw_user_posts_count AS
SELECT u.id AS user_id,
       u.username,
       u.first_name,
       u.last_name,
       COUNT(p.id) AS post_count
FROM users u
LEFT JOIN posts p ON u.id = p.user_id
GROUP BY u.id, u.username, u.first_name, u.last_name;

CREATE VIEW vw_message_pinned_files AS
SELECT cm.chat_id,
       cm.id AS message_id,
       f.path_url AS file_url,
       f.description AS file_description
FROM message_pinned_files mpf
JOIN chat_messages cm ON mpf.message_id = cm.id
JOIN files f ON mpf.file_id = f.id;

CREATE VIEW vw_active_users AS
SELECT u.id AS user_id,
       u.username,
       u.first_name,
       u.last_name
FROM users u
WHERE u.is_active = 1;

CREATE VIEW vw_most_active_users AS
SELECT u.id AS user_id,
       u.username,
       COUNT(p.id) AS post_count,
       COUNT(pc.id) AS comment_count
FROM users u
LEFT JOIN posts p ON u.id = p.user_id
LEFT JOIN post_comments pc ON p.id = pc.post_id
GROUP BY u.id, u.username;

CREATE VIEW vw_post_reaction_category AS
SELECT p.id AS post_id,
       COUNT(pr.id) AS reaction_count,
       CASE
           WHEN COUNT(pr.id) < 10 THEN 'Low Reaction'
           WHEN COUNT(pr.id) BETWEEN 10 AND 50 THEN 'Medium Reaction'
           WHEN COUNT(pr.id) > 50 THEN 'High Reaction'
       END AS reaction_category
FROM posts p
LEFT JOIN post_reactions pr ON p.id = pr.post_id
GROUP BY p.id;


--OKIDACI (TRIGGERS)

CREATE TRIGGER trg_update_post_timestamp
ON posts
AFTER UPDATE
AS
BEGIN
    UPDATE posts
    SET updated_at = CURRENT_TIMESTAMP
    WHERE id IN (SELECT id FROM inserted);
END;

--TEST TRIGGER AFTER UPDATE ON USER 1
UPDATE posts
SET content = 'This is an updated sample post.'
WHERE id = 1;


SELECT id, content, updated_at FROM posts WHERE id = 1;


CREATE TRIGGER trg_update_post_comment_timestamp
ON post_comments
AFTER UPDATE
AS
BEGIN
    UPDATE post_comments
    SET updated_at = CURRENT_TIMESTAMP
    WHERE id IN (SELECT id FROM inserted);
END;

--TEST TRIGGER AFTER UPDATE ON COMMENT FROM USER 2
UPDATE post_comments
SET content = 'This is a updated comment'
WHERE id = 2;

SELECT * FROM post_comments;

--STORED PROCEDURES
CREATE PROCEDURE CreateUser
    @username VARCHAR(100),
    @password VARCHAR(255),
    @email VARCHAR(255),
    @first_name VARCHAR(50) = '',
    @last_name VARCHAR(50) = '',
    @role CHAR(15) = 'user'
AS
BEGIN
    INSERT INTO users (username, password, email, first_name, last_name, role)
    VALUES (@username, @password, @email, @first_name, @last_name, @role);
END;

--TEST PROCEDURE
EXEC CreateUser
    @username = 'john_doe',
    @password = 'password123',
    @email = 'john.doe@example.com',
    @first_name = 'John',
    @last_name = 'Doe',
    @role = 'admin';
SELECT * FROM users;


CREATE PROCEDURE FollowUser
    @follower_user_id INT,
    @followed_user_id INT
AS
BEGIN
    INSERT INTO followers (follower_user_id, followed_user_id)
    VALUES (@follower_user_id, @followed_user_id);
END;



--TEST PROCEDURE
EXEC FollowUser 
	@follower_user_id = 8,
    @followed_user_id = 1;
SELECT * FROM followers;
 



CREATE PROCEDURE SendMessage
    @chat_id INT,
    @user_id INT,
    @content TEXT
AS
BEGIN
    INSERT INTO chat_messages (chat_id, user_id, content)
    VALUES (@chat_id, @user_id, @content);
END;



--TEST PROCEDURE
EXEC SendMessage
	@chat_id = 1,
	@user_id = 1,
    @content = 'New message executed';

SELECT * FROM chat_messages;
