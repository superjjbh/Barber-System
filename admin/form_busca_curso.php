<?php
$curso = new Curso();
$curso->db = new DB;
$curso->getCursos();
?>
<section class="widget search clearfix">
								<form class="form-inline" role="form" method="post" action="inscricao_busca_curso.php">
									<div class="input-group input-group">
										<select name="busca" required class="form-control" class="form-control" style="width:184px">
                                                    <option value="">Selecione um curso</option>
													<?php if (isset($curso->db->data[0])): ?>
                                                        <?php foreach ($curso->db->data as $categoria): ?>
                                                            <option value="<?= $categoria->curso_nome ?>"><?= $categoria->curso_nome ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
										</select>
											<button type="submit" class="btn btn-primary">Buscar</button>
									</div>
								</form>								

</section>