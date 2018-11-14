<section class="widget search clearfix">
    <form class="form-inline" role="form" method="post" action="busca_agenda_status.php">
        <div class="input-group input-group">
			<select name="status" required class="form-control" class="form-control" style="width:184px">
			  <option value="">Buscar por Status</option>
			  <option value="1">Confirmado</option>
			  <option value="0">Não Confirmado</option>
			  <option value="2">Finalizado</option>
			</select>
                <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
</section>