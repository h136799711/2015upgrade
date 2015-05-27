<?php if (!defined('THINK_PATH')) exit();?><form action="<?php echo U('Ucenter/Config/set');?>" method="post" class="configSetForm col-lg-12 form-horizontal">
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$config): $mod = ($i % 2 );++$i;?><div class="form-group">
			<label class="control-label"><?php echo ($config["title"]); ?></label>
			<span class="help-block">（<?php echo ($config["remark"]); ?>）</span> 
			<div class="controls">
				<?php switch($config["type"]): case "0": ?><input type="text" class="form-control input-short" name="config[<?php echo ($config["name"]); ?>]" value="<?php echo ($config["value"]); ?>"><?php break;?>
					<?php case "1": ?><input type="text" class="form-control input-normal" name="config[<?php echo ($config["name"]); ?>]" value="<?php echo ($config["value"]); ?>"><?php break;?>
					<?php case "2": ?><textarea class="form-control" rows="5" name="config[<?php echo ($config["name"]); ?>]"><?php echo ($config["value"]); ?></textarea><?php break;?>
					<?php case "3": ?><label class="textarea input-large">
							<textarea class="form-control" rows="5" name="config[<?php echo ($config["name"]); ?>]"><?php echo ($config["value"]); ?></textarea>
						</label><?php break;?>
					<?php case "4": ?><select class="form-control" name="config[<?php echo ($config["name"]); ?>]">
							<?php $_result=parse_config_attr($config['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if(($config["value"]) == $key): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select><?php break; endswitch;?>

			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
	<div class="form-item">
		<label class="item-label"></label>
		<div class="controls">
			<?php if(empty($list)): else: ?>
				<button type="submit" class="btn btn-primary submit-btn ajax-post" target-form="configSetForm"><?php echo L('BTN_SAVE');?></button><?php endif; ?>
		</div>
	</div>
</form>
{__NORUNTIME__}