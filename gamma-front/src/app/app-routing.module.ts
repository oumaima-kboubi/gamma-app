import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { FileImportComponent } from './file-import/file-import.component';
import { BandListComponent } from './band-list/band-list.component';
import { BandEditComponent } from './band-edit/band-edit.component';

const routes: Routes = [
  { path: '', component: FileImportComponent },
  { path: 'bands', component: BandListComponent },
  { path: 'bandsEdit/:id', component: BandEditComponent}
];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
