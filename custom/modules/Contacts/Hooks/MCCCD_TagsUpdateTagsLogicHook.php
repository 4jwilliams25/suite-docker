<?php

class MCCCD_TagsUpdateTagsLogicHook
{
    public function updateTags($bean, $event, $arguments)
    {
        // Takes the input tag ID string from the hidden field and turns it into an array
        $tagIds = explode(",", $bean->tags_c);
        // LoggerManager::getLogger()->fatal(print_r($tagIds, 1));

        // Pull the specific bean currently being worked on
        $contactBean = BeanFactory::getBean('Contacts', $bean->id);

        // Pulls all tags related to the current bean into an array
        $currentTags = $contactBean->get_linked_beans(
            'mcccd_tags_contacts_1',
            'MCCCD_Tags',
        );

        // Loads the tag relationship for this bean so we can modify it
        $contactBean->load_relationship(('mcccd_tags_contacts_1'));

        // Loops through all the related tags currently in the db, for each one it checks if that tag is in the input, and if it isn't it marks it deleted in the db
        foreach ($currentTags as $currentTag) {
            foreach ($tagIds as $inputTag) {
                if (!in_array($currentTag->id, $tagIds)) {
                    $contactBean->mcccd_tags_contacts_1->delete($contactBean->id, $currentTag);
                }
            }
        }

        // Converts the currently related tags in the db into an array of ID's
        $currentTagIds = array();
        foreach ($currentTags as $currentTag) {
            array_push($currentTagIds, $currentTag->id);
        }

        // Loops through the tag id's in the input, for each one it checks to see if is already one of the related id's in the db, if not it adds it
        foreach ($tagIds as $inputTag) {
            if (!in_array($inputTag, $currentTagIds)) {
                $contactBean->mcccd_tags_contacts_1->add($inputTag);
            }
        }
    }
}
