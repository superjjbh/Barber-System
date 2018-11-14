<section class="widget search clearfix">
    <form class="form-inline" role="form" method="post" action="busca_agenda_periodo.php">
        <div class="input-group input-group">
			<label class="control-label">Buscar por período </label>
			</br>
            <div class="form-group">
            <label class="control-label"> Data inicial </label></br>
			<input type="date" name="inicio" required class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label"> Data final </label></br>
				<input type="date" name="fim" required class="form-control" placeholder="Buscar pelo Cliente…">
            </div>
			</br>
                <button type="submit" class="btn btn-primary"> Buscar</button>
        </div>
    </form>
</section>