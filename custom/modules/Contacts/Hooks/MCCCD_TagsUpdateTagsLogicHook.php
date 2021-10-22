<?php

class MCCCD_TagsUpdateTagsLogicHook
{

    public function updateTags($bean, $event, $arguments)
    {
        // $beanId = $bean->id;
        // $tagBean = BeanFactory::getBean('MCCCD_Tags', '43af2a3f-a93f-b663-403e-612966b0e0f7');
        // $bean->custom_fields->retrieve();
        LoggerManager::getLogger()->fatal($bean->tags_c);
        // $contactBean = BeanFactory::getBean('Contacts', $beanId);
        // $contactBean->load_relationship('mcccd_tags_contacts_1');
        // $contactBean->mcccd_tags_contacts_1->add($tagBean);
    }
}
