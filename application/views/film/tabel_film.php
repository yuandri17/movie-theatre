<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('film/add') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No.</th>
										<th>Judul</th>
										<th>Genre</th>
										<th>Rumah Produksi</th>
										<th>Tahun Produksi</th>
										<th>Durasi</th>
										<th>Poster</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody align="center">
									<?php $i=1; foreach ($film as $row): ?>
									<tr>
										<td><?php echo $i++ ?></td>
										<td>
											<?php echo $row->judul ?>
										</td>
										<td>
											<?php echo $row->nama_genre ?>
										</td>
										<td>
											<?php echo $row->rumah_produksi ?>
										</td>
										<td>
											<?php echo $row->tahun_produksi ?>
										</td>
										<td>
											<?php echo $row->durasi ?>
										</td>
										<!-- <td class="small">
											<?php echo substr($row->sinopsis, 0, 120) ?>...
										</td> -->
										<td>
											<img src="<?php echo base_url('upload/film/'.$row->poster) ?>" width="70" />
										</td>
										<td>
											<a href="<?php echo site_url('film/edit/'.$row->id_film) ?>"
											 class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('film/delete/'.$row->id_film) ?>')"
											 href="#!" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>