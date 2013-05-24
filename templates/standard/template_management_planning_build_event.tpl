{foreach from=$ouvriers key=id item=ouvrier}
	{if $id != '9999999'}
		<div style="height: {$height}px;" day="{$week[$dayofweek]}" class="selectableitem" onclick="javascript:openAddPlanningBox({$ouvrier.ID},{$dayofweek},'{$week[$dayofweek]}');"></div>
		<div style="height: {$height}px;" day="{$week[$dayofweek]}" class="selectableitem zebra" onclick="javascript:openAddPlanningBox({$ouvrier.ID},{$dayofweek},'{$week[$dayofweek]}');"></div>
	{/if}
	{if $id == '9999999'}
		<!-- div style="height: {$height}px;" class="selectableitem2" onclick="javascript:return false;">{$ouvrier.day_salaire} Euro</div-->
		<div style="height: {$height}px;" class="selectableitem2 zebra2" onclick="javascript:return false;">{$ouvrier.day_hour} H</div>
		<div style="height: {$height}px;" class="selectableitem2" onclick="javascript:return false;">{$ouvrier.day_salaire_net} Euro</div>
	{/if}
{/foreach}
