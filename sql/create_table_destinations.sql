CREATE TABLE IF NOT EXISTS destinations  (
    id INT AUTO_INCREMENT PRIMARY KEY,
    article_id VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    link VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    text TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;