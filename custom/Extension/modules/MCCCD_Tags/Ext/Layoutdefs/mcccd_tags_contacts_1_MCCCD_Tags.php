<?php
 // created: 2021-08-27 21:59:24
$layout_defs["MCCCD_Tags"]["subpanel_setup"]['mcccd_tags_contacts_1'] = array (
  'order' => 100,
  'module' => 'Contacts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_MCCCD_TAGS_CONTACTS_1_FROM_CONTACTS_TITLE',
  'get_subpanel_data' => 'mcccd_tags_contacts_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
