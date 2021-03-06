<!--search-->
<section id="content" class="container_12 clearfix">


    <header class="grid_7">
		{if $total eq ""}
        <h1 class="title grid_12">Nada foi encontrado com os termos da sua busca</h1>
        <p class="grid_12">
			Por favor, tente outro termo a ser buscado.
        </p>
		{else}
        <h1 class="title grid_12">A sua busca tem {$total} resultados.</h1>
		{/if}

    </header>
    <section class="wrapper _rounded rounded_ grid_12">
        <!-- the map -->
        <section class="left">
            <section class="map" class="clearfix">

                <div id="map_canvas"></div>
				{include file="default/legend.tpl"}

            </section>

        </section>


        <!-- begin list -->
        <section class="right">
            <ul class="list">
				{foreach name=loop item=item from=$dados}

                <li>
                    <a href="{$urlbase}p/{$item.pa_id}/{substituir nome =$item.pa_nome}/" title="{$item.pa_nome}">
                        <img src="{image id =$item.pa_id}" alt="{$item.pa_id}/{substituir nome =$item.pa_nome}" width="62" height="62">
                        <span class="over sprite"></span>

									{include file="interact.tpl"}
                        <h2>{$item.pa_nome}</h2>

                        <h3>{$item.pa_cidade} - {$item.pa_estado}</h3>
                    </a>
                </li>

                {/foreach}
                
            </ul>
            {include file="default/paginate.tpl"}
        </section>

    </section>
    

</section>
