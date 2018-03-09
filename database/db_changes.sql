-- 27 Feb 2018
ALTER TABLE `users` ADD `invite_code` VARCHAR(50) NOT NULL AFTER `password`, ADD `reference_user_id` INT NOT NULL AFTER `invite_code`;
ALTER TABLE `users` CHANGE `invite_code` `invite_code` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL, CHANGE `reference_user_id` `reference_user_id` INT(11) NULL DEFAULT NULL;

ALTER TABLE `users` CHANGE `email` `email` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL, CHANGE `password` `password` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;


-- 28 Feb 2018
ALTER TABLE `users` ADD `profile_image` VARCHAR(255) NOT NULL AFTER `reference_user_id`, ADD `description` VARCHAR(1000) NOT NULL AFTER `profile_image`;


-- 6 March 2018
ALTER TABLE `card` CHANGE `image` `image` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL; 


-- 7 March 2017
ALTER TABLE `users` CHANGE `reference_user_id` `reference_profile_id` INT(11) NULL DEFAULT NULL; 
ALTER TABLE `users` ADD `invitation_id` INT NULL AFTER `reference_unique_id`;


ALTER TABLE `card` CHANGE `description` `description` VARCHAR(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
ALTER TABLE `user_profiles` CHANGE `description` `description` VARCHAR(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;