<script src='{sugar_getjspath file="custom/include/SugarFields/Fields/Tagselect/Tagselect.js"}'></script>

{* Not sure if this actually does anything, I think it might have something to do with loading values *}
{if strlen({{sugarvar key='value' string=true}}) <= 0}
    {assign var="value" value={{sugarvar key='default_value' string=true}} }
{else}
    {assign var="value" value={{sugarvar key='value' string=true}} }
{/if}
{assign var="existingTags" value=","|explode:$value}
{assign var="tagNames" value={{$tagNames}}}
{assign var="tagIds" value={{$tagIds}}}
<div id='tagDiv'>
    <input 
        type='hidden' 
        name='tags_c'
        id='tags_c'
        value='{{sugarvar key='value'}}' 
    />
    <input type='hidden' value='{{$tagNames}}' id='tagNames' /> 
    <input type='hidden' value='{{$tagIds}}' id='tagIds' /> 

    <input type='text' onclick = 'doAutoComplete({{$tagNames}})' id='tagInput' />
    <button 
        type="button" 
        class="btn btn-danger email-address-add-button" 
        title="{$app_strings.LBL_ID_FF_ADD_EMAIL} " {$other_attributes}
        onclick=addTag()
    >
        <span class="suitepicon suitepicon-action-plus"></span>
    </button>

    {php}
        global $current_user;

        $existingTags = $this->_tpl_vars['existingTags'];
        $tagNames = json_decode($this->_tpl_vars['tagNames']);
        $tagIds = json_decode($this->_tpl_vars['tagIds']);

        foreach ($existingTags as $tag) {
            $tagIndex = array_search($tag, $tagIds);
            echo "<input type='text' id='{$tag}_input' value='$tagNames[$tagIndex]' disabled><button id='{$tag}_remove' type='button' class='btn btn-danger' onclick=removeTag('{$tag}') title='RemoveTag'><span class='suitepicon suitepicon-action-minus'></span></button>";
        }
    {/php}
    
</div>