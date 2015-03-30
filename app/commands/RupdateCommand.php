<?
class RupdateCommand extends CConsoleCommand
{
    public function run($args) {

        $item = RegularCacheScanner::rescan();

        echo "Done: ".date("d-m-Y H:s:i").' - '.($item?$item->id:'error')."\n";
    }
}