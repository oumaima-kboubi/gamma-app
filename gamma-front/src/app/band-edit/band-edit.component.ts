import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Band } from 'src/models/band.model';
import { BandService } from '../band-service.service';

@Component({
  selector: 'app-band-edit',
  templateUrl: './band-edit.component.html',
  styleUrls: ['./band-edit.component.css'],
})
export class BandEditComponent implements OnInit {
  bandId = 0;
  //bandData: Band | undefined;
  bandData: Band = {
    id: 0,
    nomGroupe: '',
    origine: '',
    ville: '',
    anneeDebut: 0,
    anneeSeparation: 0,
    fondateurs: '',
    membres: 0,
    courantMusical: '',
    presentation: '',
  };
  showWarningDeb: boolean = false;
  showWarningSep: boolean = false;
  showWarningSubmit: boolean = false;
  validDeb: boolean = true;
  validSep: boolean = true;
  now = new Date();

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private bandService: BandService
  ) {}

  ngOnInit(): void {
    this.bandId = +this.route.snapshot.paramMap.get('id')!;
    this.loadBandData();
  }

  private loadBandData() {
    this.bandService.getBandById(this.bandId).subscribe(
      (data) => {
        // Store the retrieved data in the property
        this.bandData = data;
      },
      (error) => {
        console.error('Error fetching band data:', error);
      }
    );
  }

  onSubmit() {
    // console.log(this.bandData);

    if (this.bandData.anneeDebut > this.now.getFullYear()) {
      this.showWarningDeb = true;
      this.validDeb = false;
    } else {
      this.showWarningDeb = false;
      this.validDeb = true;
    }
    if (this.bandData.anneeSeparation > this.now.getFullYear()) {
      this.showWarningSep = true;
      this.validSep = false;
    } else {
      this.showWarningSep = false;
      this.validSep = true;
    }
    //bon pour optimiser je peux juste tester sur showWarning Sep et Deb
    if (this.validDeb && this.validSep) {
      this.bandService.updateBand(this.bandData, this.bandId).subscribe(() => {
        this.router.navigate(['/bands']);
      });
      this.showWarningSubmit = false;
    } else {
      this.showWarningSubmit = true;
    }
  }
  cancel() {
    this.router.navigate(['/bands']);
  }
}
