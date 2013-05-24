<div class = "protocol">
			
	<div class="block_in_wrapper">
			
		<h3>{$sumehr_report.datetime}
		{foreach item=permission from=$sumehr_permission}
			{$permission.name}
		{/foreach}
		</h3>
													
		{$sumehr_report.text}

		{foreach item=file from=$sumehr_files}
			
				<br/>File: 
				<img alt='' src='./templates/standard/images/butn-{$file.extension}-hover.png'/> 
				<a target='_blank' href='user_sumehr.php?action=download_file&key={$file.key}&user_id={$sumehr_report.user_ID}&patient_id={$sumehr_report.patient_ID}'>{$file.name} ({$file.size}Ko)</a>
				<br/><br/>
				
				{if $file.numberimage > 0}
		        	<a href="user_sumehr.php?action=download_image&key={$file.key}&thumbnail=1&user_id={$sumehr_report.user_ID}&patient_id={$sumehr_report.patient_ID}&iframe=true&width=1000&amp;height=1000&user_id={$sumehr_report.user_ID}&patient_id={$sumehr_report.patient_ID}" class="image_{$sumehr_report.ID}" rel="prettyPhoto[iframes]">
	        			<img width="150px" src="user_sumehr.php?action=download_image&key={$file.key}&thumbnail=1&user_id={$sumehr_report.user_ID}&patient_id={$sumehr_report.patient_ID}">
	        		</a>
	        	{/if}
				
	        	{if $file.numberimage > 1}
		        	<a href="user_sumehr.php?action=download_image&key={$file.key}&thumbnail=2&user_id={$sumehr_report.user_ID}&patient_id={$sumehr_report.patient_ID}&iframe=true&width=1000&amp;height=1000&user_id={$sumehr_report.user_ID}&patient_id={$sumehr_report.patient_ID}" class="image_{$sumehr_report.ID}" rel="prettyPhoto[iframes]">
	        			<img width="150px" src="user_sumehr.php?action=download_image&key={$file.key}&thumbnail=2&user_id={$sumehr_report.user_ID}&patient_id={$sumehr_report.patient_ID}">
	        		</a>
	        	{/if}
	        	
	        	{if $file.numberimage > 2}
		        	<a href="user_sumehr.php?action=download_image&key={$file.key}&thumbnail=3&user_id={$sumehr_report.user_ID}&patient_id={$sumehr_report.patient_ID}&iframe=true&width=1000&amp;height=1000&user_id={$sumehr_report.user_ID}&patient_id={$sumehr_report.patient_ID}" class="image_{$sumehr_report.ID}" rel="prettyPhoto[iframes]">
	        			<img width="150px" src="user_sumehr.php?action=download_image&key={$file.key}&thumbnail=3&user_id={$sumehr_report.user_ID}&patient_id={$sumehr_report.patient_ID}">
	        		</a>
	        	{/if}
			
		{/foreach}
													
		<br/>

		{if $sumehr_report.user_ID == $user_id}
		<a href="user_sumehr.php?action=edit&patient_id={$sumehr_report.patient_ID}&report_id={$sumehr_report.ID}" class="butn_link"><span>Edition</span></a>
		{/if}
		<br/>
			
	</div> {*block_in_wrapper end*}
			
</div>	
	
<div class="clear_both"></div>