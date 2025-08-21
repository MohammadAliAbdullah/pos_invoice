-- all alter queries in one file
ALTER TABLE `users` ADD `deleted_at` DATETIME(3) NULL DEFAULT NULL AFTER `updated_at`;
ALTER TABLE `users` ADD `is_active` TINYINT(1) NULL DEFAULT NULL AFTER `deleted_at`;
ALTER TABLE `users` ADD `is_admin` TINYINT(1) NULL DEFAULT NULL AFTER `is_active`;
ALTER TABLE `users` ADD `is_verified` TINYINT(1) NULL DEFAULT NULL AFTER `is_admin`;
ALTER TABLE `users` ADD `is_suspended` TINYINT(1) NULL DEFAULT NULL AFTER `is_verified`;
ALTER TABLE `users` ADD `is_banned` TINYINT(1) NULL DEFAULT NULL AFTER `is_suspended`;
ALTER TABLE `users` ADD `is_deleted` TINYINT(1) NULL DEFAULT NULL AFTER `is_banned`;
ALTER TABLE `users` ADD `last_login_at` DATETIME(3) NULL DEFAULT NULL AFTER `is_deleted`;
ALTER TABLE `users` ADD `last_login_ip` VARCHAR(45) NULL DEFAULT NULL AFTER `last_login_at`;
ALTER TABLE `users` ADD `last_activity_at` DATETIME(3) NULL DEFAULT NULL AFTER `last_login_ip`;
ALTER TABLE `users` ADD `last_activity_ip` VARCHAR(45) NULL DEFAULT NULL AFTER `last_activity_at`;