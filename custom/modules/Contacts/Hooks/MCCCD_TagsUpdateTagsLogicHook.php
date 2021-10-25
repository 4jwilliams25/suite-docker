<?php

class MCCCD_TagsUpdateTagsLogicHook
{

    public function updateTags($bean, $event, $arguments)
    {
        $tagIds = explode(",", $bean->tags_c);
        LoggerManager::getLogger()->fatal(print_r($tagIds, 1));

        $contactBean = BeanFactory::getBean('Contacts', $bean->id);

        $currentTags = $contactBean->get_linked_beans(
            'mcccd_tags_contacts_1',
            'MCCCD_Tags',
        );

        $contactBean->load_relationship(('mcccd_tags_contacts_1'));

        foreach ($currentTags as $currentTag) {
            foreach ($tagIds as $inputTag) {
                if (!in_array($currentTag->id, $tagIds)) {
                    $contactBean->mcccd_tags_contacts_1->delete($contactBean->id, $currentTag);
                }
            }
        }

        $currentTagIds = array();
        foreach ($currentTags as $currentTag) {
            array_push($currentTagIds, $currentTag->id);
        }

        foreach ($tagIds as $inputTag) {
            if (!in_array($inputTag, $currentTagIds)) {
                $contactBean->mcccd_tags_contacts_1->add($inputTag);
            }
        }
    }
}
