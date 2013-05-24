{section name=planning loop=$plannings}
<div class="chip" dayofweek="{$dayofweek}" day="" id="chip{$plannings[planning].planning_ID}" style="height:{$height}px; width: 100%; background-color:{$plannings[planning].planning_color2}; top:{$plannings[planning].top}px; left: 0%;" ondblclick="javascript:openViewPlanningBox({$plannings[planning].planning_ID});">
	<div class="title" style="background-color:{$plannings[planning].planning_color1};">
			<span class="timelabel">{$plannings[planning].planning_salaire} Euro ({$plannings[planning].planning_hour} H)</span>
	</div>
	<div class="content">
		B&eacute;n&eacute;fice : {$plannings[planning].planning_revenue}
	</div>
	<div class="content">
		{$plannings[planning].planning_resource}
	</div>
	<div class="content">
		{$plannings[planning].planning_comment}
	</div>
	<div class="resizeChip" unselectable="on" style="-moz-user-select: none;"/>
</div>

{/section}

