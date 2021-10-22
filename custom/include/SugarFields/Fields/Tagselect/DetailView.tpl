{if strlen({{sugarvar key='value' string=true}}) <= 0}
{assign var="value" value={{sugarvar key='default_value' string=true}} }
{else}
{assign var="value" value={{sugarvar key='value' string=true}} }
{/if} 
<span class="sugar_field" id="{{sugarvar key='name'}}">{{sugarvar key='value'}}</span>