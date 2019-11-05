import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';
import {SigninComponent} from "./auth/signin/signin.component";
import {CounterComponent} from "./counter/counter.component";


const routes: Routes = [
  {path: 'signin', component: SigninComponent},
  {path: '', component: CounterComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {
}
