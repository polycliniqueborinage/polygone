<div class="jqmConfirmWindow">
		
			<div class="jqmConfirmTitle clearfix">
    			<h1>{$motif.description}</h1>
  			</div>
  		
</div>
			  
<div class="block_in_wrapper">

				<form class="main" method="post" action="#">
	
					<fieldset>
					
						<div id="viewboxdetail" style="width:100%;">
										
							{$motif.rappel}
																			
							{$motif.main_text}
							
							<br/>

						</div>

					</fieldset>

				</form>

</div>

			  
<div class="block_in_wrapper">

				<form class="main" method="post" action="#">
	
					<fieldset>
					
						<div style="width:100%;">
						
	<ul id='accordion_messages'>

	{section name=tarification loop=$tarifications}
	
		{if $smarty.section.product.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
	
			{$tarifications[tarification].id}

			{$tarifications[tarification].tarification_details}
			
				<ul>
				
					{section name=tarificationdetail loop=$tarifications[tarification].tarification_details}
					
						'{$tarifications[tarification].tarification_details[tarificationdetail].cecodi}'
					
					{/section}
					
				
				</ul>			
			
			</li>

	{/section}
	
	</ul>
									
																			
						</div>

					</fieldset>

				</form>

</div>


		
		
		

