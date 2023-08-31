CREATE DATABASE IF NOT EXISTS `php_oop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `php_oop`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard User', ''),
(2, 'Administrator', '{\"admin\":1,\"moderator\":1}');

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(50) NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Products (
  id INT PRIMARY KEY,
  name VARCHAR(255),
  description VARCHAR(255),
  price INT
);

CREATE TABLE Orders (
  id INT PRIMARY KEY,
  user_id INT,
  created DATE,
  total DOUBLE,
  comment VARCHAR(255),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE Orderline (
  id INT PRIMARY KEY,
  order_id INT,
  product_name VARCHAR(255),
  product_price DOUBLE,
  quantity INT,
  FOREIGN KEY (order_id) REFERENCES Orders(id)
);

CREATE TABLE Basket (
  id INT PRIMARY KEY,
  user_id INT,
  orderLine_id INT,
  total_price DOUBLE,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (orderLine_id) REFERENCES Orderline(id)
);
