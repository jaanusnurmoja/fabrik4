ALTER TABLE `#__fabrik_connections` ALTER `host` SET DEFAULT '';
ALTER TABLE `#__fabrik_connections` ALTER `user` SET DEFAULT '';
ALTER TABLE `#__fabrik_connections` ALTER `password` SET DEFAULT '';
ALTER TABLE `#__fabrik_connections` ALTER `database` SET DEFAULT '';
ALTER TABLE `#__fabrik_connections` ALTER `description` SET DEFAULT '';
ALTER TABLE `#__fabrik_connections` ALTER `published` SET DEFAULT 0;
ALTER TABLE `#__fabrik_connections` ALTER `checked_out` SET DEFAULT 0;
ALTER TABLE `#__fabrik_connections` MODIFY `checked_out_time` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_connections` ALTER `default` SET DEFAULT 0;

ALTER TABLE `#__fabrik_cron` ALTER `label` SET DEFAULT '';
ALTER TABLE `#__fabrik_cron` ALTER `frequency` SET DEFAULT 0;
ALTER TABLE `#__fabrik_cron` ALTER `unit` SET DEFAULT '';
ALTER TABLE `#__fabrik_cron` MODIFY `created` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_cron` ALTER `created_by` SET DEFAULT 0;
ALTER TABLE `#__fabrik_cron` ALTER `created_by_alias` SET DEFAULT '';
ALTER TABLE `#__fabrik_cron` MODIFY `modified` datetime DEFAULT null;
ALTER TABLE `#__fabrik_cron` ALTER `modified_by` SET DEFAULT '';
ALTER TABLE `#__fabrik_cron` ALTER `checked_out` SET DEFAULT 0;
ALTER TABLE `#__fabrik_cron` MODIFY `checked_out_time` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_cron` ALTER `published` SET DEFAULT 1;
ALTER TABLE `#__fabrik_cron` ALTER `plugin` SET DEFAULT '';
ALTER TABLE `#__fabrik_cron` MODIFY `lastrun` datetime NULL DEFAULT NULL;

ALTER TABLE `#__fabrik_elements` ALTER `name` SET DEFAULT '';
ALTER TABLE `#__fabrik_elements` ALTER `group_id` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `plugin` SET DEFAULT '';
ALTER TABLE `#__fabrik_elements` MODIFY `created` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_elements` ALTER `created_by` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `created_by_alias` SET DEFAULT '';
ALTER TABLE `#__fabrik_elements` ALTER `height` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `hidden` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `eval` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `ordering` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `show_in_list_summary` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `filter_type` SET DEFAULT '';
ALTER TABLE `#__fabrik_elements` ALTER `filter_exact_match` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `published` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `link_to_detail` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `primary_key` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `auto_increment` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `access` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `use_in_page_title` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` MODIFY `modified` datetime DEFAULT null;
ALTER TABLE `#__fabrik_elements` ALTER `modified_by` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `checked_out` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` MODIFY `checked_out_time` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_elements` ALTER `width` SET DEFAULT 0;
ALTER TABLE `#__fabrik_elements` ALTER `parent_id` SET DEFAULT 0;

ALTER TABLE `#__fabrik_formgroup` ALTER `form_id` SET DEFAULT 0;
ALTER TABLE `#__fabrik_formgroup` ALTER `group_id` SET DEFAULT 0;
ALTER TABLE `#__fabrik_formgroup` ALTER `ordering` SET DEFAULT 0;

ALTER TABLE `#__fabrik_forms` ALTER `label` SET DEFAULT '';
ALTER TABLE `#__fabrik_forms` ALTER `record_in_database` SET DEFAULT 0;
ALTER TABLE `#__fabrik_forms` ALTER `error` SET DEFAULT '';
ALTER TABLE `#__fabrik_forms` MODIFY `created` datetime DEFAULT null;
ALTER TABLE `#__fabrik_forms` ALTER `created_by` SET DEFAULT 0;
ALTER TABLE `#__fabrik_forms` ALTER `created_by_alias` SET DEFAULT '';
ALTER TABLE `#__fabrik_forms` MODIFY `publish_up` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_forms` MODIFY `publish_down` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_forms` ALTER `submit_button_label` SET DEFAULT '';
ALTER TABLE `#__fabrik_forms` ALTER `form_template` SET DEFAULT '';
ALTER TABLE `#__fabrik_forms` ALTER `view_only_template` SET DEFAULT '';
ALTER TABLE `#__fabrik_forms` ALTER `published` SET DEFAULT 0;
ALTER TABLE `#__fabrik_forms` ALTER `private` SET DEFAULT 0;
ALTER TABLE `#__fabrik_forms` MODIFY `modified` datetime DEFAULT null;
ALTER TABLE `#__fabrik_forms` ALTER `modified_by` SET DEFAULT 0;
ALTER TABLE `#__fabrik_forms` ALTER `checked_out` SET DEFAULT 0;
ALTER TABLE `#__fabrik_forms` MODIFY `checked_out_time` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_forms` ALTER `reset_button_label` SET DEFAULT '';

ALTER TABLE `#__fabrik_form_sessions` ALTER `hash` SET DEFAULT '';
ALTER TABLE `#__fabrik_form_sessions` ALTER `user_id` SET DEFAULT 0;
ALTER TABLE `#__fabrik_form_sessions` ALTER `form_id` SET DEFAULT 0;
ALTER TABLE `#__fabrik_form_sessions` ALTER `row_id` SET DEFAULT 0;
ALTER TABLE `#__fabrik_form_sessions` ALTER `last_page` SET DEFAULT 0;
ALTER TABLE `#__fabrik_form_sessions` ALTER `referring_url` SET DEFAULT '';
ALTER TABLE `#__fabrik_form_sessions` MODIFY `time_date` datetime DEFAULT null;

ALTER TABLE `#__fabrik_groups` ALTER `name` SET DEFAULT '';
ALTER TABLE `#__fabrik_groups` ALTER `label` SET DEFAULT '';
ALTER TABLE `#__fabrik_groups` ALTER `published` SET DEFAULT 0;
ALTER TABLE `#__fabrik_groups` MODIFY `created` datetime DEFAULT null;
ALTER TABLE `#__fabrik_groups` ALTER `created_by` SET DEFAULT 0;
ALTER TABLE `#__fabrik_groups` ALTER `created_by_alias` SET DEFAULT '';
ALTER TABLE `#__fabrik_groups` ALTER `is_join` SET DEFAULT 0;
ALTER TABLE `#__fabrik_groups` ALTER `private` SET DEFAULT 0;
ALTER TABLE `#__fabrik_groups` MODIFY `modified` datetime DEFAULT null;
ALTER TABLE `#__fabrik_groups` ALTER `modified_by` SET DEFAULT 0;
ALTER TABLE `#__fabrik_groups` ALTER `checked_out` SET DEFAULT 0;
ALTER TABLE `#__fabrik_groups` MODIFY `checked_out_time` datetime NULL DEFAULT NULL;

ALTER TABLE `#__fabrik_joins` ALTER `list_id` SET DEFAULT 0;
ALTER TABLE `#__fabrik_joins` ALTER `element_id` SET DEFAULT 0;
ALTER TABLE `#__fabrik_joins` ALTER `group_id` SET DEFAULT 0;
ALTER TABLE `#__fabrik_joins` ALTER `join_from_table` SET DEFAULT '';
ALTER TABLE `#__fabrik_joins` ALTER `table_join` SET DEFAULT '';
ALTER TABLE `#__fabrik_joins` ALTER `table_key` SET DEFAULT '';
ALTER TABLE `#__fabrik_joins` ALTER `table_join_key` SET DEFAULT '';
ALTER TABLE `#__fabrik_joins` ALTER `join_type` SET DEFAULT '';

ALTER TABLE `#__fabrik_jsactions` ALTER `element_id` SET DEFAULT 0;
ALTER TABLE `#__fabrik_jsactions` ALTER `action` SET DEFAULT '';

ALTER TABLE `#__fabrik_lists` ALTER `label` SET DEFAULT '';
ALTER TABLE `#__fabrik_lists` ALTER `db_table_name` SET DEFAULT '';
ALTER TABLE `#__fabrik_lists` ALTER `db_primary_key` SET DEFAULT '';
ALTER TABLE `#__fabrik_lists` ALTER `auto_inc` SET DEFAULT 0;
ALTER TABLE `#__fabrik_lists` ALTER `connection_id` SET DEFAULT 0;
ALTER TABLE `#__fabrik_lists` MODIFY `created` datetime DEFAULT null;
ALTER TABLE `#__fabrik_lists` ALTER `created_by` SET DEFAULT 0;
ALTER TABLE `#__fabrik_lists` ALTER `created_by_alias` SET DEFAULT '';
ALTER TABLE `#__fabrik_lists` ALTER `published` SET DEFAULT 0;
ALTER TABLE `#__fabrik_lists` MODIFY `publish_up` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_lists` MODIFY `publish_down` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_lists` ALTER `access` SET DEFAULT 0;
ALTER TABLE `#__fabrik_lists` ALTER `rows_per_page` SET DEFAULT 0;
ALTER TABLE `#__fabrik_lists` ALTER `template` SET DEFAULT '';
ALTER TABLE `#__fabrik_lists` ALTER `order_by` SET DEFAULT '';
ALTER TABLE `#__fabrik_lists` ALTER `order_dir` SET DEFAULT 'ASC';
ALTER TABLE `#__fabrik_lists` ALTER `filter_action` SET DEFAULT '';
ALTER TABLE `#__fabrik_lists` ALTER `group_by` SET DEFAULT '';
ALTER TABLE `#__fabrik_lists` ALTER `private` SET DEFAULT 0;
ALTER TABLE `#__fabrik_lists` ALTER `form_id` SET DEFAULT 0;
ALTER TABLE `#__fabrik_lists` MODIFY `modified` datetime DEFAULT null;
ALTER TABLE `#__fabrik_lists` ALTER `modified_by` SET DEFAULT 0;
ALTER TABLE `#__fabrik_lists` ALTER `checked_out` SET DEFAULT 0;
ALTER TABLE `#__fabrik_lists` MODIFY `checked_out_time` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_lists` ALTER `hits` SET DEFAULT 0;

ALTER TABLE `#__fabrik_log` ALTER `flag` SET DEFAULT 0;
ALTER TABLE `#__fabrik_log` ALTER `referring_url` SET DEFAULT '';
ALTER TABLE `#__fabrik_log` ALTER `message_source` SET DEFAULT '';
ALTER TABLE `#__fabrik_log` ALTER `message_type` SET DEFAULT '';

ALTER TABLE `#__fabrik_validations` ALTER `element_id` SET DEFAULT 0;
ALTER TABLE `#__fabrik_validations` ALTER `validation_plugin` SET DEFAULT '';
ALTER TABLE `#__fabrik_validations` ALTER `message` SET DEFAULT '';
ALTER TABLE `#__fabrik_validations` ALTER `client_side_validation` SET DEFAULT 0;
ALTER TABLE `#__fabrik_validations` ALTER `checked_out` SET DEFAULT 0;
ALTER TABLE `#__fabrik_validations` MODIFY `checked_out_time` datetime NULL DEFAULT NULL;

ALTER TABLE `#__fabrik_visualizations` ALTER `plugin` SET DEFAULT '';
ALTER TABLE `#__fabrik_visualizations` ALTER `label` SET DEFAULT '';
ALTER TABLE `#__fabrik_visualizations` MODIFY `created` datetime DEFAULT null;
ALTER TABLE `#__fabrik_visualizations` ALTER `created_by` SET DEFAULT 0;
ALTER TABLE `#__fabrik_visualizations` ALTER `created_by_alias` SET DEFAULT '';
ALTER TABLE `#__fabrik_visualizations` MODIFY `modified` datetime DEFAULT null;
ALTER TABLE `#__fabrik_visualizations` ALTER `modified_by` SET DEFAULT 0;
ALTER TABLE `#__fabrik_visualizations` ALTER `checked_out` SET DEFAULT 0;
ALTER TABLE `#__fabrik_visualizations` MODIFY `checked_out_time` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_visualizations` MODIFY `publish_up` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_visualizations` MODIFY `publish_down` datetime NULL DEFAULT NULL;
ALTER TABLE `#__fabrik_visualizations` ALTER `published` SET DEFAULT 0;
ALTER TABLE `#__fabrik_visualizations` ALTER `access` SET DEFAULT 0;

DROP TABLE IF EXISTS  `#__fabrik_packages`;