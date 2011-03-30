<div id="lista-proximos">
	{if $template eq "default/parish.tpl"}
		<header>
			<h1>Lugares próximos</h1>
		</header>
	{/if}
	<ul class="list">	
		{foreach name=proximos item=proximo from=$proximos}			
			<li>
				<a href="{$urlbase}p/{$proximo.pa_id}/{substituir nome =$proximo.pa_nome}/">
					 <img src="{image id =$item.pa_id}" alt="{$proximo.pa_id}/{substituir nome =$proximo.pa_nome}" width="62" height="62">
					<span class="over sprite"></span>
					{include file="interact.tpl"}
					<h2>{$proximo.pa_nome}</h2>

					<h3>{$proximo.pa_cidade}</h3>
				</a>
			</li>
		{/foreach}		
	</ul>
</div>
{include file="default/paginacao.tpl"}