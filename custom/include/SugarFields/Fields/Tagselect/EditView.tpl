<script src='{sugar_getjspath file="custom/include/SugarFields/Fields/Tagselect/Tagselect.js"}'></script>

{* Not sure if this actually does anything, I think it might have something to do with loading values *}
{if strlen({{sugarvar key='value' string=true}}) <= 0}
    {assign var="value" value={{sugarvar key='default_value' string=true}} }
{else}
    {assign var="value" value={{sugarvar key='value' string=true}} }
{/if}

<div id='tagDiv'>
    <input 
        type='hidden' 
        name='tags_c'
        id='tags_c' 
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
</div>