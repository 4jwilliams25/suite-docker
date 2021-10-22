{if strlen({{sugarvar key='value' string=true}}) <= 0}
{assign var="value" value={{sugarvar key='default_value' string=true}} }
{else}
{assign var="value" value={{sugarvar key='value' string=true}} }
{/if}  

<div id='tagDiv'>
    <script src='{sugar_getjspath file="custom/include/SugarFields/Fields/Tagselect/Tagselect.js"}'></script>
    <input 
        type='text' 
        {* name='{{if empty($displayParams.idName)}}{{sugarvar key='name'}}{{else}}{{$displayParams.idName}}{{/if}}' *}
        name='tags_c'
        id='newTag' 
        onclick='doAutoComplete({{$tagList}})' 
        value='{$value}' 
    />
    <input type='hidden' value='{{$tagNames}}' id='tagValues' />
    <input type='hidden' value='{{$tagIds}}' id='tagKeys' />
    <button 
        type="button" 
        class="btn btn-danger email-address-add-button" 
        title="{$app_strings.LBL_ID_FF_ADD_EMAIL} " {$other_attributes}
        onclick=addTag()
    >
        <span class="suitepicon suitepicon-action-plus"></span>
        <span></span>
    </button>
</div>