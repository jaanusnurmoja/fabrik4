UPDATE `#__fabrik_elements` SET plugin = (SELECT replace(plugin,'fabrik', ''));
UPDATE `#__fabrik_elements` set plugin = 'display' WHERE plugin = 'displaytext';
UPDATE  `#__content` SET introtext = (SELECT replace(introtext, '{fabrik view=table', '{fabrik view=list'));
ALTER TABLE `#__fabrik_connections` CHANGE `attribs` `params` TEXT;
ALTER TABLE `#__fabrik_connections` CHANGE `state` `published` INT( 1 ) NOT NULL DEFAULT '0';
ALTER TABLE `#__fabrik_cron` CHANGE `state` `published` INT( 1 ) NOT NULL DEFAULT '0';
ALTER TABLE `#__fabrik_cron` CHANGE `attribs` `params` TEXT NOT NULL;
ALTER TABLE `#__fabrik_elements` CHANGE `show_in_table_summary` `show_in_list_summary` INT( 1 ) NOT NULL DEFAULT '0';
ALTER TABLE `#__fabrik_elements` DROP `can_order`;
ALTER TABLE `#__fabrik_elements` CHANGE `state` `published` INT( 1 ) NOT NULL DEFAULT '0';
ALTER TABLE `#__fabrik_elements` DROP `button_javascript`;
ALTER TABLE `#__fabrik_elements` DROP `sub_values`;
ALTER TABLE `#__fabrik_elements` DROP `sub_labels`;
ALTER TABLE `#__fabrik_elements` DROP `sub_intial_selection`;
ALTER TABLE `#__fabrik_elements` CHANGE `attribs` `params` TEXT NOT NULL;
ALTER TABLE `#__fabrik_forms` CHANGE `state` `published` INT( 1 ) NOT NULL DEFAULT '0';
ALTER TABLE `#__fabrik_forms` CHANGE `attribs` `params` TEXT NOT NULL;
ALTER TABLE `#__fabrik_groups` CHANGE `state` `published` INT( 1 ) NOT NULL DEFAULT '0';
ALTER TABLE `#__fabrik_groups` CHANGE `attribs` `params` TEXT NOT NULL;
ALTER TABLE `#__fabrik_joins` CHANGE `table_id` `list_id` INT( 6 ) NOT NULL;
ALTER TABLE `#__fabrik_joins` CHANGE `attribs` `params` TEXT NOT NULL; 
ALTER TABLE `#__fabrik_jsactions` CHANGE `attribs` `params` TEXT NOT NULL;
RENAME TABLE `#__fabrik_tables` TO `#__fabrik_lists`;
ALTER TABLE `#__fabrik_lists` CHANGE `state` `published` INT( 1 ) NOT NULL DEFAULT '0';
ALTER TABLE `#__fabrik_lists` CHANGE `attribs` `params` TEXT NOT NULL;
ALTER TABLE `#__fabrik_log` ADD `flag` SMALLINT(3) NOT NULL;
ALTER TABLE `#__fabrik_log` ADD `message_source` VARCHAR(255) NOT NULL;
ALTER TABLE `#__fabrik_packages` CHANGE `state` `published` INT( 1 ) NOT NULL DEFAULT '0';
ALTER TABLE `#__fabrik_packages` CHANGE `attribs` `params` TEXT NOT NULL;
ALTER TABLE `#__fabrik_packages` ADD `external_ref` VARCHAR(255) NOT NULL;
ALTER TABLE `#__fabrik_packages` ADD `component_name` VARCHAR(100) NOT NULL;
ALTER TABLE `#__fabrik_packages` ADD `version` VARCHAR(10) NOT NULL;
ALTER TABLE `#__fabrik_packages` DROP `tables`;
ALTER TABLE `#__fabrik_validations` CHANGE `clent_side_validation` `client_side_validation` INT( 1 ) NOT NULL DEFAULT '0';
ALTER TABLE `#__fabrik_validations` CHANGE `attribs` `params` TEXT NOT NULL;
ALTER TABLE `#__fabrik_visualizations` CHANGE `state` `published` INT( 1 ) NOT NULL DEFAULT '0';
ALTER TABLE `#__fabrik_visualizations` CHANGE `attribs` `params` TEXT NOT NULL;

