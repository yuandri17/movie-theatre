<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('jadwal/add') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No.</th>
										<th>Judul</th>
										<th>Studio</th>
										<th>Tanggal Tayang</th>
										<th>Jam Tayang</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody align="center">
									<?php $i=1; foreach ($jadwal as $row): ?>
									<tr>
										<td><?php echo $i++ ?></td>
										<td>
											<?php echo $row->judul ?>
										</td>
										<td>
											<?php echo $row->nama_studio ?>
										</td>
										<td>
											<?php echo longdate_indo($row->tanggal_tayang) ?>
										</td>
										<td>
											<?php echo $row->jam_tayang ?>
										</td>
										<td>
											<a href="<?php echo site_url('jadwal/edit/'.$row->id_jadwal) ?>"
											 class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('jadwal/delete/'.$row->id_jadwal) ?>')"
											 href="#!" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>