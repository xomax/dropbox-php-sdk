<?php
namespace Kunnu\Dropbox\Models;

class LinksCollection extends MetadataCollection
{
    /**
     * Collection Items Key
     *
     * @const string
     */
    const COLLECTION_ITEMS_KEY = 'links';

    /**
     * Collection has-more-items Key
     *
     * @const string
     */
    const COLLECTION_HAS_MORE_ITEMS_KEY = 'has_more';

    /**
     * Process items and cast them
     * to their respective Models
     *
     * @param array $items Unprocessed Items
     *
     * @return void
     */
    protected function processItems(array $items)
    {
        $processedItems = [];

        foreach ($items as $entry) {
            if (isset($entry['.tag']) && $entry['.tag'] == 'file') {
                $processedItems[] = new FileMetadata($entry);
            }
        }

        $this->items = new ModelCollection($processedItems);
    }
}
