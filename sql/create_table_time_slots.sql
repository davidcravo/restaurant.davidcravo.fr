CREATE TABLE IF NOT EXISTS time_slots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    day_of_the_week VARCHAR(255) NOT NULL,
    am_start VARCHAR(255),
    am_end VARCHAR(255),
    pm_start VARCHAR(255),
    pm_end VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;