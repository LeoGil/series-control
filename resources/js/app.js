import './bootstrap';
import '../sass/app.scss';
import 'bootstrap';
import { preventDoubleSubmit } from './form-utils';

window.preventDoubleSubmit = preventDoubleSubmit;