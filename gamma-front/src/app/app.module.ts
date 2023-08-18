import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BackgroundPageComponent } from './background-page/background-page.component';
import { FileImportComponent } from './file-import/file-import.component';
import { HttpClientModule } from '@angular/common/http';
import { BandListComponent } from './band-list/band-list.component';

@NgModule({
  declarations: [
    AppComponent,
    BackgroundPageComponent,
    FileImportComponent,
    BandListComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
