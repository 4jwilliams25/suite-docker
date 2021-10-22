<?php

require_once 'include/SugarFields/Fields/Base/SugarFieldBase.php';
require_once 'data/SugarBean.php';

class SugarFieldTagselect extends SugarFieldBase
{

    public function getTagList()
    {

        $tagBean = BeanFactory::getBean('MCCCD_Tags');

        $tagList = $tagBean->get_full_list(
            $order_by = "",
            $where = "",
            $check_dates = false,
            $show_deleted = 0
        );

        $existingTags =  array();

        for ($i = 0; $i < count($tagList); $i++) {
            $existingTags[$tagList[$i]->id] = $tagList[$i]->name;
        }

        return $existingTags;
    }

    /**
     * Setup function to assign values to the smarty template, should be called before every display function
     * @param $parentFieldArray
     * @param $vardef
     * @param $displayParams
     * @param $tabindex
     * @param bool $twopass
     */
    public function setup($parentFieldArray, $vardef, $displayParams, $tabindex, $twopass = true)
    {
        $this->button = '';
        $this->buttons = '';
        $this->image = '';
        if ($twopass) {
            $this->ss->left_delimiter = '{{';
            $this->ss->right_delimiter = '}}';
        } else {
            $this->ss->left_delimiter = '{';
            $this->ss->right_delimiter = '}';
        }

        $tagList = $this->getTagList();
        $jsonTagNames = json_encode(array_keys($tagList));
        $jsonTagIds = json_encode(array_values($tagList));

        $this->ss->assign('parentFieldArray', $parentFieldArray);
        $this->ss->assign('vardef', $vardef);
        $this->ss->assign('tabindex', $tabindex);
        $this->ss->assign('tagNames', $jsonTagNames);
        $this->ss->assign('tagIds', $jsonTagIds);

        //for adding attributes to the field

        if (!empty($displayParams['field'])) {
            $plusField = '';
            foreach ($displayParams['field'] as $key => $value) {
                $plusField .= ' ' . $key . '="' . $value . '"'; //bug 27381
            }
            $displayParams['field'] = $plusField;
        }
        //for adding attributes to the button
        if (!empty($displayParams['button'])) {
            $plusField = '';
            foreach ($displayParams['button'] as $key => $value) {
                $plusField .= ' ' . $key . '="' . $value . '"';
            }
            $displayParams['button'] = $plusField;
            $this->button = $displayParams['button'];
        }
        if (!empty($displayParams['buttons'])) {
            $plusField = '';
            foreach ($displayParams['buttons'] as $keys => $values) {
                foreach ($values as $key => $value) {
                    $plusField[$keys] .= ' ' . $key . '="' . $value . '"';
                }
            }
            $displayParams['buttons'] = $plusField;
            $this->buttons = $displayParams['buttons'];
        }
        if (!empty($displayParams['image'])) {
            $plusField = '';
            foreach ($displayParams['image'] as $key => $value) {
                $plusField .= ' ' . $key . '="' . $value . '"';
            }
            $displayParams['image'] = $plusField;
            $this->image = $displayParams['image'];
        }
        $this->ss->assign('displayParams', $displayParams);
    }
}
