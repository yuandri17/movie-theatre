<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('genre/add') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No.</th>
										<th>Nama Genre</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody align="center">
									<?php $i=1; foreach ($genre as $row): ?>
									<tr>
										<td><?php echo $i++ ?></td>
										<td>
											<?php echo $row->nama_genre ?>
										</td>
										<td>
											<a href="<?php echo site_url('genre/edit/'.$row->id_genre) ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('genre/delete/'.$row->id_genre) ?>')"
											 href="#!" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>