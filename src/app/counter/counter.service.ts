import {Injectable} from '@angular/core';
import {Observable} from "rxjs";
import {HttpClient, HttpHeaders} from "@angular/common/http";
import {AuthService} from "../auth/auth.service";

@Injectable({
  providedIn: 'root'
})
export class CounterService {

  constructor(private http: HttpClient,
              private authService: AuthService) {
  }

  increment(counter: number): Observable<any> {
    let accessToken = this.authService.getAccessToken();
    let options = {
      headers: new HttpHeaders({
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${accessToken}`,
      }),
    };
    let url = 'http://localhost:8080/increment';
    let param = JSON.stringify({counter: counter});

    return this.http.post(url, param, options);
  }
}
