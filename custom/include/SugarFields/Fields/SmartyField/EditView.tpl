{if empty({{sugarvar key='value' string=true}})}
    {assign var="value" value={{sugarvar key='default_value' string=true}} }
    {else}
    {assign var="value" value={{sugarvar key='value' string=true}} }
{/if}


{{capture name=idname assign=idname}}
    {{sugarvar key='name'}}
{{/capture}}
{{if !empty($displayParams.idName)}}
    {{assign var=idname value=$displayParams.idName}}
{{/if}}

{{sugar_include type="smarty" file=$headerTpl}}

{php}
    $test1 = "This is my first test.";
    $this->_tpl_vars['test2'] = "This is my second test.";

    $string = "Hello Neverland!";

    $array = array('Item1', 'Item2', 'Item3');

    console_log($array);

{/php}

{assign var="test3" value="This is my third test."}

<textarea  
    id='{{$idname}}'
    name='{{$idname}}'
    rows="
        {{if !empty($displayParams.rows)}}
            {{$displayParams.rows}}
        {{elseif !empty($vardef.rows)}}
            {{$vardef.rows}}
        {{else}}
            {{4}}
        {{/if}}"
    cols="
        {{if !empty($displayParams.cols)}}
            {{$displayParams.cols}}
        {{elseif !empty($vardef.cols)}}
            {{$vardef.cols}}
        {{else}}
            {{60}}
        {{/if}}"
    title='{{$vardef.help}}' 
    tabindex="{{$tabindex}}" 
    {{$displayParams.field}}
    {{if !empty($displayParams.accesskey)}}
        accesskey='{{$displayParams.accesskey}}'
    {{/if}}>
    {$value}
</textarea>
<h3>{$test1}</h3>
<h3>{$test2}</h3>
<h3>{$test3}</h3>
<h3>{$test4}</h3>


{literal}{{$tinymce}}{/literal}