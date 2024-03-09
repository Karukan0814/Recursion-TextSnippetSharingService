CREATE TABLE IF NOT EXISTS tags (
    tagId INT PRIMARY KEY AUTO_INCREMENT,
    tagName VARCHAR(50)

);\n
CREATE TABLE IF NOT EXISTS postTags (
    postId INT ,
    tagId INT ,
    FOREIGN KEY (postId) REFERENCES posts(postId),
    FOREIGN KEY (tagId) REFERENCES tags(tagId)


);