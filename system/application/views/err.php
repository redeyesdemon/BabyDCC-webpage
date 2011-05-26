			<!-- Contenido principal -->
			
			<div id="main">
				
				<a name="error"></a>
				<h2><?php echo $err_title;?></h2>
				<div class="ui-widget">
					<div class="ui-corner-all ui-state-error" style="padding: 0.7em;">
						<p><span class="ui-icon ui-icon-alert" style="float:left; margin-right: .3em;"></span>
						<strong>Error:</strong><?php echo $err_msg:?></p>
					</div>
				</div>
				<br />
				<center>
					<input type="button" class="button" value="Atrás" onclick="javascript:history.go(-1);" />
				</center>
			</div>
		
			<!-- Contenido finaliza aquí -->
