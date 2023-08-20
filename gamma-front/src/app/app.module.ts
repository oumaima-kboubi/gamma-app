import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BackgroundPageComponent } from './background-page/background-page.component';
import { FileImportComponent } from './file-import/file-import.component';
import { HttpClientModule } from '@angular/common/http';
import { BandListComponent } from './band-list/band-list.component';
import { BandEditComponent } from './band-edit/band-edit.component';
import { FormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    AppComponent,
    BackgroundPageComponent,
    FileImportComponent,
    BandListComponent,
    BandEditComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
