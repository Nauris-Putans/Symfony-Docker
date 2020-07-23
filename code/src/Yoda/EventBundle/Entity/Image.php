<?php

namespace Yoda\EventBundle\Entity;

use DateTime;
use Decimal\Decimal;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Acme\DemoBundle\Services;


/**
 * Image
 *
 * @ORM\Table(name="image")
// * @ORM\Entity(repositoryClass="Yoda\EventBundle\Repository\ImageRepository")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Image
{


    /**
     * Unmapped property to handle file uploads
     */
    private $file;

    /**
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }




    public function getAbsolutePath($basepath)
    {
        return null === $this->filename ? null : $this->getUploadRootDir($basepath).'/'.$this->filename;
    }

    public function getWebPath()
    {
        return null === $this->filename ? null : $this->getUploadDir().'/'.$this->filename;
    }

    protected function getUploadRootDir($basepath)
    {
        // the absolute directory path where uploaded documents should be saved
        return $basepath.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return "uploads/images";
    }




//
//
//    public function uploadS3($key, $filepath)
//    {
//        return $this->getClient()->putObject([
//            'ACL'        => 'public-read',
//            'Bucket'     => $this->getBucket(),
//            'Key'        => $key,
//            'SourceFile' => $filepath
//        ]);
//    }





    /**
     * Manages the copying of the file to the relevant place on the server
     * @param $basepath
     */
    public function upload($basepath)
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        if (null === $basepath) {
            return;
        }

//
//        $s3 = $this->container->get('s3');
//        $s3->put('your/s3/path/photo.jpg', file_get_contents($uploadedFile));
//
//        $storage = $this->getContainer()->get('demo_storage');
//
//// Upload a file with the content "content text" and the MIME-Type text/plain
//        $storage->upload('test.txt', 'content text', ['contentType' => 'text/plain']);
//
//// Upload a local existing File and let the service automatically detect the mime type.
//        $storage->uploadFile('file path' . 'demo.pdf');


        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and target filename as params
        $this->file->move($this->getUploadRootDir($basepath), $this->file->getClientOriginalName());

        // set the path property to the filename where you've saved the file
        $this->filename = $this->getFile()->getClientOriginalName();

        $this->size = $this->getFile()->getClientSize();

        $this->mimeType = $this->getFile()->getClientMimeType();

        $this->path = $this->getFile()->getPathname();

        // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }


    /**
     * Lifecycle callback to upload the file to the server.
     * @param $basepath
     */
    public function lifecycleFileUpload($basepath)
    {
        $this->upload($basepath);
    }

    /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire.
     * @throws Exception
     */
    public function refreshUpdated()
    {
        $timezones = 'Europe/Riga';

        $this->setUpdated(new \DateTime("now", new \DateTimeZone($timezones)));

    }

    // ... the rest of your class lives under here, including the generated fields
    //     such as filename and updated






    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255, nullable=false)
     */
    public $filename;

    /**
     * @param UploadedFile $size
     *
     * @ORM\Column(name="size", type="string")
     */
    public $size;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    public $path;

    /**
     * @param UploadedFile $mimeType
     *
     * @ORM\Column(name="mime_type", type="string")
     */
    public $mimeType;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    public $updated;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return Image
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set updated
     *
     * @param DateTime $updated
     *
     * @return Image
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param mixed $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }


}

