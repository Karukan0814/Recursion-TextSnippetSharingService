ALTER TABLE posts ADD categoryId INT;\n
ALTER TABLE posts ADD CONSTRAINT fk_category FOREIGN KEY (categoryId) REFERENCES categories(categoryId);



