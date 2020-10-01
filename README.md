
#PHP RSS feed builder

###Instruction for use
Create a channel image

>$rssImage = new RssImageType();<br>
>$rssImage->setLink("http://koroph.site"); <br>
>$rssImage->setUrl("http://koroph.site/image/url"); <br>
>$rssImage->setHeight(80);<br>
>$rssImage->setWidth(80);<br>

Create RSS input channel

>$rssInput = new RssInputType();<br>
>$rssInput->setTitle("My application");<br>
>$rssInput->setName("Koroph");<br>
>$rssInput->setLink("http://koroph.site");<br>
>$rssInput->setDescription("http://koroph.site");<br>

Create item channel

>$rssItem = new RssItem();<br>
>$rssItem->setTitle("Article $i");<br>
>$rssItem->setDescription("Last blog article. $i");<br>
>$rssItem->setAuthor("koroph");<br>
>$rssItem->setEnclosure("http://koroph.site/image/url", "jpg");<br>
>$rssItem->setComments("set my comment");<br>
>$rssItem->setCategory("life", "program");<br>
>$rssItem->setLink("http://koroph.site/link/$i");<br>
>$rssItem->setGuid("http://koroph.site/guid/$i");<br>
>$rssItem->setPubDate("Wed, $i Nov 201$i 13:20:00 GMT");<br>

Generate RSS feed document

>$builder = new RssBuilder();<br>
>$builder->setTitle("my handle blog");<br>
>$builder->setLink("http://koroph.site");<br>
>$builder->setDescription("any articles");<br>
>$builder->setLanguage("en");<br>
>$builder->setSkipDays(RssDayType::FRIDAY, RssDayType::THURSDAY);<br>
>$builder->setSkipHours(2, 4, 6, 8);<br>
>>$builder->setImage($rssImage);<br>
>>$builder->add($rssItem);<br>
>
>echo $builder->getDocument();<br>

PHP RSS feed builder is simple is easy to use