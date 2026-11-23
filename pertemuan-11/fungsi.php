<?php
function bersihkan($teks)
{
return htmlspecialchars($teks ?? "", ENT_QUOTES, "UTF-8");
}
function tebal($teks)
{
return "<strong>" . bersihkan($teks) . "</strong>";
}