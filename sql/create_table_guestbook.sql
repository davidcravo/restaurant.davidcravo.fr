CREATE TABLE IF NOT EXISTS guestbook (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    date INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;