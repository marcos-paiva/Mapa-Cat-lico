<section class="container_12">
	<header class="grid_7">
		<h1 class="title">{if $pa.pa_tipo eq "1"}Paroquia :{else} Capela{/if} {$pa.pa_nome}</h1>
	</header>
	<section class="wrapper _rounded rounded_ grid_12">
		<section class="left">
			<!-- mapa -->
			<section class="map" class="clearfix">
				<div id="map_canvas"></div>
			</section>
			<!-- end map -->
		
			<!-- funcões -->
			<section id="fn" class="clearfix">
				<ul>
					<li><a href="" id="route" class="_rounded rounded_"><span class="link">Como chegar</span> <span class="sprite">></span></a></li>
					<li><a href="" id="here" class="_rounded rounded_">Eu já estive aqui</a></li>
					<li id="twitt"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="mapacatolico">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>
					<li id="face"><iframe src="http://www.facebook.com/plugins/like.php?href&amp;layout=button_count&amp;show_faces=false&amp;width=120&amp;action=like&amp;font=trebuchet+ms&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:65px; height:21px;" allowTransparency="true"></iframe></li>
					<li><a href="" class="share _rounded rounded_"><span class="sprite">Envelope</span>Email</a></li>
					<li><a href="" class="share _rounded rounded_"> < /embed></a></li>
				</ul>
			</section>
			<!-- end funcões -->
			<hr>
			<!-- infos -->
			<section id="info">
				<div>
					<p>Diocese:{$diocese}</p>
					<p>Bispo:{$bispo}</p>
					<p>Pároco:{$pa.pa_paroco}</p>
				</div>
				<p id="institucional">
					TEL: pa.pa_tel}, email: colocarumemail@coloque.com - <a href="{$pa.pa_site}">(colocar o site){$pa.pa_site}</a><br>
					{$pa.pa_rua}, {$pa.pa_numero}, {$pa.pa_bairro} - {$pa.pa_cidade}-{$pa.pa_estado} / {$pa.pa_pais}
				</p>
				<span class="clear"></span>
				<hr>
				<p id="description">
					{$pa.pa_descricao}
				</p>
				<hr>
				<p id="update">
					<small>Última atualização em 00/00/0000 - por "usuário"</small><br>
					Achou alguma informação incorreta? Colabore <a href="">editando esse perfil</a> ou <a href="">denunciando abuso</a>
					
				</p>
			</section>
			<!--  -->
			
		</section>
		
	<!-- begin list -->
		<ul class="list">
			<li>
				<a href="">
					<img src="{$urlbase}public/img/gueres.jpg" alt="">
					<span class="see _rounded rounded_" title="Veja mais">Veja +</span>
					<h2>Paróquia são benedito do escapulário sagrado</h2>
					<h3>Cachoeira Paulista - SP</h3>
				</a>
			</li>
			<li>
				<a href="">
					<img src="{$urlbase}public/img/gueres.jpg" alt="">
					<span class="see _rounded rounded_" title="Veja mais">Veja +</span>
					<h2>Paróquia são benedito do escapulário sagrado</h2>
					<h3>Cachoeira Paulista - SP</h3>
				</a>
			</li>
			<li>
				<a href="">
					<img src="{$urlbase}public/img/gueres.jpg" alt="">
					<span class="see _rounded rounded_" title="Veja mais">Veja +</span>
					<h2>Paróquia são benedito do escapulário sagrado</h2>
					<h3>Cachoeira Paulista - SP</h3>
				</a>
			</li>
			<li>
				<a href="">
					<img src="{$urlbase}public/img/gueres.jpg" alt="">
					<span class="see _rounded rounded_" title="Veja mais">Veja +</span>
					<h2>Paróquia são benedito do escapulário sagrado</h2>
					<h3>Cachoeira Paulista - SP</h3>
				</a>
			</li>
			<li>
				<a href="">
					<img src="{$urlbase}public/img/gueres.jpg" alt="">
					<span class="see _rounded rounded_" title="Veja mais">Veja +</span>
					<h2>Paróquia são benedito do escapulário sagrado</h2>
					<h3>Cachoeira Paulista - SP</h3>
				</a>
			</li>
		</ul>
	
		{include file="default/paginate.tpl"}	
	<!-- end list -->
	</section>


</section>



<span class="clear"></span>